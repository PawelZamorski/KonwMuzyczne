<?php

namespace Konwersatorium\Services;

use Konwersatorium\Domain\OfferReservation;
use Konwersatorium\Core\Config;


/* przelewy24: parametry
* urlReturn - Po poprawnej transakcji Klient jest kierowany na adres podany w parametrze urlReturn
* urlStatus - system P24 wysyła potwierdzenie transakcji na adres podany w parametrze "urlStatus".
* - weryfikacja wyniku transakcj
* - potwierdzenie zamówienia przez sprzedawce wyslane do klienta
* - potwierdzenie email do klienta przez przelewy24

* CRC - Cyclic Redundancy Check (CRC) – unikatowy klucz (String) otrzymany od Przelewy24 służący do generowania przesyłanej sumy kontrolnej
* Dynamic Currency Conversion (DCC) – proces, w którym kwota transakcji jest przeliczana na walutę karty płatnika
* url: https://sandbox.przelewy24.pl/api/v1
* 
* Authentication:
* User i secretdId dostępne są w panelu:
- "User" odpowiada tej samej wartości, co posId,
- secretId, odpowiada tej samej wartości co klucz do raportów (klucz do API).
*
* Przed wysłaniem żądania transakcji należy zapisać jej dane do lokalnej bazy danych sprzedawcy. W szczególności należy zachować informacje o identyfikatorze sesji i kwocie transakcji.
* - kwota transakcji
* - SessionId
*/


/*
Dzień dobry,

płatności kartowe zostały na poniższych kontach aktywowane:
USD 136352,
EUR 136353,
CHF 136354,
GBP 136355,
NOK 136356,
AUD 136357,
CAD 136358,
DKK 136359,
SEK 136360.
*/
class PaymentPrzelewy24 {
    private $config_przelewy24;
    private $config_domain;

    public function __construct() {
        // get config data
        $this->config_przelewy24 = Config::getConfig()->get('przelewy24'); // returns string
        $this->config_domain = Config::getConfig()->get('domain'); // returns string

        // TODO -> add Logger
    }

    /*
    * Przed wysłaniem żądania transakcji należy zapisać jej dane do lokalnej bazy danych sprzedawcy. W szczególności należy zachować informacje o identyfikatorze sesji i kwocie transakcji.
    * Przekierowanie do panelu transakcyjnego
    * // Adres URL https://secure.przelewy24.pl/trnRequest/{TOKEN}
    * gdzie {TOKEN} został pobrany w wyniku zarejestrowania transakcji.
    * parameter Object OfferReservation
    */

    // TODO log errors -> must use Logger object
    // TODO
    public function getTokenRequest($offerResObj) {
        // currency is used to determine the account type (PLN, EUR, ect)
        // set up as first, as it is used to get data from array
        $currency = $offerResObj->getCurrency(); // res table

        // set up variables
        // required variables
        $merchantId = $this->config_przelewy24[$currency]['merchantId']; // config
        $posID = $this->config_przelewy24[$currency]['posID']; // config
        $sessionId = $offerResObj->getResNo(); // res table/ res No -> Session ID – unikalny identyfikator służący do zidentyfikowania pojedynczej transakcji w systemie partnera.
        $amount = intval($offerResObj->getAmount()) * 100; // res table
        $description = $offerResObj->getOfferCategory() . $offerResObj->getOfferName(); // res table
        $email = $offerResObj->getEmail(); // res table
        $country = $offerResObj->getCountry();
//        $language = $offerResObj->getLangCode(); // constant
        $language = $this->config_przelewy24[$currency]['lang'];;
        $urlReturn = $this->config_domain;

        $crc = $this->config_przelewy24[$currency]['crc']; //config
        $keyAPI = $this->config_przelewy24[$currency]['keyAPI']; // config
        $sign = $this->generateSign($sessionId, $merchantId, $amount, $currency, $crc);

        // aditional variables
        $client = $offerResObj->getName() . $offerResObj->getSurname();
        $address = $offerResObj->getStreet();
        $zip = $offerResObj->getPostcode();
        $city = $offerResObj->getTown();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->config_przelewy24[$currency]['url'] . "/api/v1/transaction/register",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{
                "merchantId":' . $merchantId . ',
                "posId":' . $posID . ',
                "sessionId":"' . $sessionId . '",
                "amount":' . $amount . ',
                "currency":"' . $currency . '",
                "description":"' . $description . '",
                "email":"' . $email . '",
                "client":"' . $client . '",
                "address":"' . $address . '",
                "zip":"' . $zip . '",
                "city":"' . $city . '",
                "country":"' . $country . '",
                "language":"' . $language . '",
                "urlReturn":"' . $urlReturn . '",
                "urlStatus":"' . $this->config_domain . '/offer/buy/payment/status?status=OK",
                "channel":16,
                "sign":"' . $sign . '"
            }',

            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . $this->generateAuthKey($merchantId, $keyAPI) . "",
                "Content-Type: application/json",
//                "Postman-Token: ff930d0f-66a2-4477-b9e5-0297f12ef39c",
                "cache-control: no-cache"
            ),
    ));

        $response = curl_exec($curl);

//var_dump($response);
// $respone -> string(73) "{"data":{"token":"EF7855-....-C6C1A37AA3"},"responseCode":0}"
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return ""; 
        } else {
            // return token
            $data = json_decode($response, true); // pass true as the argument in json_decode(), the data becomes an associative array instead of an object
            $token = $data["data"]["token"];
            return $token;
        }
    }


    // $dataArr -> notificaition send by przelewy24
    // Confirms verification, gets result from payment service
    public function confirmVerification($dataArr) {
        // set up variables
        // set up as first, as it is used to get data from array
        $currency = $dataArr['currency']; // notification

        $merchantId = $this->config_przelewy24[$currency]['merchantId']; // config
        $posID = $this->config_przelewy24[$currency]['posID']; // config
        $sessionId = $dataArr['sessionId']; // notification
        $amount = $dataArr['amount']; // notification
        $orderId = $dataArr['orderId']; // notification
        $crc = $this->config_przelewy24[$currency]['crc']; //config
        $keyAPI = $this->config_przelewy24[$currency]['keyAPI']; // config

        $sign = $this->generateSignStatus($sessionId, $orderId, $amount, $currency, $crc);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->config_przelewy24[$currency]['url'] . "/api/v1/transaction/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => '{
                "merchantId":' . $merchantId . ',
                "posId":' . $posID . ',
                "sessionId":"' . $sessionId . '",
                "amount":' . $amount . ',
                "currency":"' . $currency . '",
                "orderId":' . $orderId . ',
                "sign":"' . $sign . '"}',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic " . $this->generateAuthKey($merchantId, $keyAPI) . "",
                "Content-Type: application/json",
//                "Postman-Token: cec960ea-488f-42d1-b2db-5ffb64443dda",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // TODO return false
            return "My Error works: " . $err;
        } else {
            // TODO return true
            return "My Response works: " . $response;
        }
    }



    /*
    * Returns 
    *  
    * Suma kontrolna parametrów:
    * {"sessionId":"str","merchantId":int,"amount":int,"currency":"str","crc":"str"}
    *
    * liczona z użyciem sha384
    *
    * WAŻNE!:
    * przy wykorzystaniu funkcji json_encode należy dodać następujące atrybuty
    * "JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES"
    */
    private function generateSign ($sessionId, $merchantId, $amount, $currency, $crc) {
        // Suma kontrolna parametrów: {"sessionId":"str","merchantId":int,"amount":int,"currency":"str","crc":"str"}
        // It takes the whole json (key:value) as a string
        $hashCreated = hash('sha384', '{"sessionId":"' . $sessionId . '","merchantId":' . $merchantId . ',"amount":' . $amount . ',"currency":"' . $currency . '","crc":"' . $crc . '"}');
        return $hashCreated;
    }



    // {"sessionId":"str","orderId":int,"amount":int,"currency":"str","crc":"str"}
    private function generateSignStatus($sessionId, $orderId, $amount, $currency, $crc) {
        // Suma kontrolna parametrów: {"sessionId":"str","merchantId":int,"amount":int,"currency":"str","crc":"str"}
        // It takes the whole json (key:value) as a string
        $hashCreated = hash('sha384', '{"sessionId":"' . $sessionId . '","orderId":' . $orderId . ',"amount":' . $amount . ',"currency":"' . $currency . '","crc":"' . $crc . '"}');
        return $hashCreated;
    }


    /*
    * w polu o nazwie "Authorization" powinien znaleźć się wynik funkcji kodującej Base64 będącej połączeniem 
    * parametrów "Id_sprzedawcy:Klucz_API", zapisany jako string
    */
    private function generateAuthKey($merchantId, $keyAPI) {
        // Suma kontrolna parametrów: "Id_sprzedawcy:Klucz_API", zapisany jako string
        // wynik funkcji kodującej Base64
        return base64_encode($merchantId . ":" . $keyAPI);
    }
}

