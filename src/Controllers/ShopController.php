<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Models\ShopModel;
use Konwersatorium\Models\FormModel;
use Konwersatorium\Core\Config;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Exceptions\LogicException;

use Konwersatorium\Services\FormProcess;
use Konwersatorium\Services\MailerBuy;
use Konwersatorium\Services\RecaptchaValidator;
use Konwersatorium\Services\PaymentPrzelewy24;

class ShopController extends AbstractController {

    public function getBuyFormByOfferId($lang, $offer_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerById = $offerModel->getOfferById($offer_id);
            // get OfferCourseNEW based on courses_id
            $offerCourse = $offerModel->getCourseById($lang, $offerById->getCoursesId());
            // get OfferCategory based on category_id
            $offerCategory = $offerModel->getOfferCategoryById($lang, $offerById->getCategoryId());

            // get OfferBuy data 
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');

            // get form fields description data
            $formModel = new FormModel($this->conn);
            $formFieldsDesc = $formModel->getAllFields($lang);

            // get the list of countries
            $countries = $this->getCountries();

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerId' => $offer_id,
                'offerCourse' => $offerCourse,
                'offerCategory' => $offerCategory,
                'offerBuyArr' => $offerBuyArr,
                'formFieldsDesc' => $formFieldsDesc,
                'recaptchaConfig' => $recaptchaConfig,
                'countries' => $countries
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }
        return $this->render('offer-buy-form.twig', $properties);
    }

    public function payOfferById($lang, $offer_id) {
        // instantiate array
        $properties = array();

        // variables for conditions
        $isRecaptchaValid = false;
        $isFormValid = false;
        $isProductAvailable = false;
        $isEmailSend = false;

        try {
            // DATA FOR REDIRECTING TO FORM (COPIED FROM )
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerById = $offerModel->getOfferById($offer_id);
            // get OfferCourseNEW based on courses_id
            $offerCourse = $offerModel->getCourseById($lang, $offerById->getCoursesId());
            // get OfferCategory based on category_id
            $offerCategory = $offerModel->getOfferCategoryById($lang, $offerById->getCategoryId());

            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');

            // check availibility of an item
            $quantity = $offerCourse->getQuantity();

            // get form fields description data
            $formModel = new FormModel($this->conn);
            $formFieldsDesc = $formModel->getAllFields($lang);

            // get the list of countries
            $countries = $this->getCountries();

            // DATA FOR REDIRECTING TO PAYMENT
            // validate recaptcha
            $recaptchaValidator = new RecaptchaValidator();
            $isRecaptchaValid = $recaptchaValidator->isRecaptchaValid();

            if($isRecaptchaValid) {
                // validate form
                $formProcess = new FormProcess();
                // array of input fields names. Names must be the same as in form.
                $arrInputFields = array('offerId', 'offerCategory', 'offerName', 'langCode', 'name' ,'surname', 'street', 
                    'town', 'postcode', 'country', 'email', 'amount', 'currency', 'lessonType');
                $data = $formProcess->processForm($lang, $arrInputFields);
                // form values as an associated array
                $validationResult = $data['validatorResult'];

                // check availability of an item
                $offerId = intval($validationResult['offerId']->getValue()); // TODO: check if offerId is number
                $shopModel = new ShopModel($this->conn);

                $isFormValid = $data['isFormValid'];
            }


            // create reservation if form is valid and item is available
            if($isFormValid && $quantity > 0) {
                // parse validationResult to OfferReservation object
                $offerReservation = $formProcess->parseFormToOfferReservation($lang, $validationResult);
                // create reservation, get last id

                // return object OfferReservation with id
                $offerReservation = $shopModel->createOfferReservation_2($offerReservation);
                // decrement the quantity of available item
                $shopModel->updateItemQuantity($offerCourse->getId(), $quantity - 1);

                // send email
                // set res_no and res_id in MailerBuy object to use it in isEmailSend
                $mailerBuy = new MailerBuy($offerReservation);
                $isEmailSend = $mailerBuy->isEmailSend($lang);

                if($isEmailSend) {
                    // TODO -> check if correct i think that is is not correct, because you cannot clear POST that way, but you must redirect
                    // clear Post data to prevent from resubmission
                    // $_POST[] = array();
                } else {
                    // Delete reservation from DB
                }
            }

            // DATA FOR REDIRECTIONG TO FORM WITH ERROR MESSAGE
            // set up error message
            $errorMessage = '';

            if(!$isEmailSend) {
                $errorMessage = 'Opppssss! Email nie został wysłany. Prosimy o kontakt z biurem.';
            }
            if (!$isProductAvailable) {
                $errorMessage = 'Niestety, oferta nie jest już dostępna. Prosimy o kontakt z biurem.';
            }
            if (!$isFormValid) {
                $errorMessage = 'Dane wpisane do formularza są niepoprawne. Prosimy o ponowne wypełnienie.';
            }
            if (!$isRecaptchaValid) {
                $errorMessage = 'Recaptcha nie została przeprowadzona pomyślnie. Prosimy o ponowne wypełnienie formularza.';
            }

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        } catch (LogicException $e) {
            $this->log->error('LogicException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }

        if($isEmailSend) {
            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerBuyArr' => $offerBuyArr,
                'offerReservation' => $offerReservation
                ];

            return $this->render('offer-payment.twig', $properties);
        } else {
            // redirect to form with error message

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerId' => $offer_id,
                'offerCourse' => $offerCourse,
                'offerCategory' => $offerCategory,
                'offerBuyArr' => $offerBuyArr,
                'formFieldsDesc' => $formFieldsDesc,
                'recaptchaConfig' => $recaptchaConfig,
                'quantity' => $quantity,
                'countries' => $countries,
                // data with error message
                'errorMessage' => $errorMessage
                ];
                            
            return $this->render('offer-buy-form.twig', $properties); // display offer-buy page with error message
        }
    }




    public function payOfferByIdResidResno($lang, $offer_id, $res_id, $res_no) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get OfferBuy data
            $offerModel = new OfferModel($this->conn);
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get OfferReservation
            $shopModel = new ShopModel($this->conn);
            $offerReservation = $shopModel->getOfferReservationById($res_id);

            // TODO: check if reservation is valid. If not valid (7 day) display page with offers and include message, that res is not valid but someone can make new reservation.
            // $errorMessage
            $processed = true;

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerBuyArr' => $offerBuyArr,
                'offerReservation' => $offerReservation
            ];
        
        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }

        if($processed) {
            return $this->render('offer-payment.twig', $properties);
        } else {
            // TODO: if reservation is not valid, redirect to url: offer buy
            return $this->render('offer-buy-form.twig', $properties); // display offer-buy page with error message
        }
    }


    public function paymentGateway($lang) {

        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get data to payment
            // get POST res_id
            $res_id = '';
            if(isset($_POST['res_id'])) $res_id = $_POST['res_id'];
            // check if res_id is empty. If it is empty throw exception
            if(empty($res_id) || !is_numeric($res_id)) {
                echo "res_no is empty or not numeric";


                throw new NotFoundException();
            } else {
                // convert to number
                $res_id = intval($res_id);
            }
            
            $shopModel = new ShopModel($this->conn);
            $offerReservationById = $shopModel->getOfferReservationById($res_id);

            $paymentPrzelewy24 = new PaymentPrzelewy24();
            // TODO: $token as a respone
            $token = $paymentPrzelewy24->getTokenRequest($offerReservationById);

            // if $response = 0 -> throw exception.
            // TODO  Use NotFoundException for a while, but refactor
            if(empty($token)) {
                echo "Empty token";

                throw new NotFoundException();
            }

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr
                ];

        } catch (NotFoundException $e) {

            echo "other reason";


            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching faild. Token empty.');
        }
//            header("location: https://google.com"); // 302 id default, it is move temporary
 
        // if $response != 0 -> redirect to pzelewy24
//        header("Location: http://www.example.com/another-page.php", true, 301); // use 301 to move permanently
        
        // TEST - use url for przelewy24 sandbox
        // header("location: https://sandbox.przelewy24.pl/trnRequest/" . $token); // 302 id default, it is move temporary

        header("location: https://secure.przelewy24.pl/trnRequest/" . $token); // 302 id default, it is move temporary
        exit();
    }


    public function paymentStatus() {
        $this->log->info('OfferController::paymentStatus');

        try {
            // get GET data from response from przelewy24
            $status = '';
            if(isset($_GET['status'])) $status = $_GET['status'];
            // check if status is empty. If it is empty throw exception

            $this->log->info('Status confirmed 1: ' . $status);
//            $this->log->warning('http_response_header: ' . json_encode($http_response_header));
            $this->log->info('apache_request_headers(): ' . json_encode(apache_request_headers()));
//            $this->log->warning('getallheaders ( ): ' . json_encode(getallheaders()));
//            $this->log->warning('apache_response_headers ( ): ' . json_encode(apache_response_headers()));
            
            $this->log->info('OfferController::paymentStatus() -> file_get_contents("php://input"): ' . file_get_contents('php://input'));

            $dataJson = file_get_contents('php://input');
            $dataArr = json_decode($dataJson, true);

            if(empty($status)) {
                // TODO use other exception
                throw new NotFoundException();
            }
            
            // Change the status of transaction in DB
            $shopModel = new ShopModel($this->conn);
            // 1) get transaction id
            $this->log->info('OfferController::paymentStatus() -> after creating $shopModel.');
            $id = $shopModel->getId($dataArr['sessionId']); // res_no i DB refers to sessionId in Przelewy24 Notification
            // 2) update transaction status
            $this->log->info('OfferController::paymentStatus() -> after getting id from DB.');
            $id =  intval($id);
            $shopModel->updateOfferReservationStatusById($id);
            $this->log->info('OfferController::paymentStatus() -> after updating DB.');

            // confirm that transaction is correct to przelewy24
            // get data from response
            $paymentPrzelewy24 = new PaymentPrzelewy24();
            $this->log->info('OfferController::paymentStatus() -> after creating PaymentPrzelewy24 object.');
            $getVerificationStatusResponse = $paymentPrzelewy24->confirmVerification($dataArr); // gets przelewy24 Notification
            $this->log->info('OfferController::paymentStatus() -> $getVerificationStatusResponse: ' . $getVerificationStatusResponse);
            

            // $token = $paymentPrzelewy24->getTokenRequest($offerReservationById);

            // // if $response = 0 -> throw exception.
            // // TODO  Use NotFoundException for a while, but refactor
            // if(empty($token)) {
            //     throw new NotFoundException();
            // }

            // // send confirmation email to customer
            // if ($getVerificationStatusResponse == ) -> send email

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching faild. Status confirmation.');
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
        $this->log->info('OfferController::paymentStatus() -> end of function: ' . $status);
        exit();
    }

    private function getCountries() {
        $countries = array(
                "AF"=>"Afghanistan","AL"=>"Albania","DZ"=>"Algeria","AS"=>"American Samoa","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AQ"=>"Antarctica","AG"=>"Antigua and Barbuda","AR"=>"Argentina","AM"=>"Armenia","AW"=>"Aruba","AU"=>"Australia","AT"=>"Austria","AZ"=>"Azerbaijan","BS"=>"Bahamas (the)","BH"=>"Bahrain","BD"=>"Bangladesh","BB"=>"Barbados","BY"=>"Belarus","BE"=>"Belgium","BZ"=>"Belize","BJ"=>"Benin","BM"=>"Bermuda","BT"=>"Bhutan","BO"=>"Bolivia (Plurinational State of)","BQ"=>"Bonaire, Sint Eustatius and Saba","BA"=>"Bosnia and Herzegovina","BW"=>"Botswana","BV"=>"Bouvet Island","BR"=>"Brazil","IO"=>"British Indian Ocean Territory (the)","BN"=>"Brunei Darussalam","BG"=>"Bulgaria","BF"=>"Burkina Faso","BI"=>"Burundi","CV"=>"Cabo Verde","KH"=>"Cambodia","CM"=>"Cameroon","CA"=>"Canada","KY"=>"Cayman Islands (the)","CF"=>"Central African Republic (the)","TD"=>"Chad","CL"=>"Chile","CN"=>"China","CX"=>"Christmas Island","CC"=>"Cocos (Keeling) Islands (the)","CO"=>"Colombia","KM"=>"Comoros (the)","CD"=>"Congo (the Democratic Republic of the)","CG"=>"Congo (the)","CK"=>"Cook Islands (the)","CR"=>"Costa Rica","HR"=>"Croatia","CU"=>"Cuba","CW"=>"Curaçao","CY"=>"Cyprus","CZ"=>"Czechia","CI"=>"Côte d'Ivoire","DK"=>"Denmark","DJ"=>"Djibouti","DM"=>"Dominica","DO"=>"Dominican Republic (the)","EC"=>"Ecuador","EG"=>"Egypt","SV"=>"El Salvador","GQ"=>"Equatorial Guinea","ER"=>"Eritrea","EE"=>"Estonia","SZ"=>"Eswatini","ET"=>"Ethiopia","FK"=>"Falkland Islands (the) [Malvinas]","FO"=>"Faroe Islands (the)","FJ"=>"Fiji","FI"=>"Finland","FR"=>"France","GF"=>"French Guiana","PF"=>"French Polynesia","TF"=>"French Southern Territories (the)","GA"=>"Gabon","GM"=>"Gambia (the)","GE"=>"Georgia","DE"=>"Germany","GH"=>"Ghana","GI"=>"Gibraltar","GR"=>"Greece","GL"=>"Greenland","GD"=>"Grenada","GP"=>"Guadeloupe","GU"=>"Guam","GT"=>"Guatemala","GG"=>"Guernsey","GN"=>"Guinea","GW"=>"Guinea-Bissau","GY"=>"Guyana","HT"=>"Haiti","HM"=>"Heard Island and McDonald Islands","VA"=>"Holy See (the)","HN"=>"Honduras","HK"=>"Hong Kong","HU"=>"Hungary","IS"=>"Iceland","IN"=>"India","ID"=>"Indonesia","IR"=>"Iran (Islamic Republic of)","IQ"=>"Iraq","IE"=>"Ireland","IM"=>"Isle of Man","IL"=>"Israel","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","JE"=>"Jersey","JO"=>"Jordan","KZ"=>"Kazakhstan","KE"=>"Kenya","KI"=>"Kiribati","KP"=>"Korea (the Democratic People's Republic of)","KR"=>"Korea (the Republic of)","KW"=>"Kuwait","KG"=>"Kyrgyzstan","LA"=>"Lao People's Democratic Republic (the)","LV"=>"Latvia","LB"=>"Lebanon","LS"=>"Lesotho","LR"=>"Liberia","LY"=>"Libya","LI"=>"Liechtenstein","LT"=>"Lithuania","LU"=>"Luxembourg","MO"=>"Macao","MG"=>"Madagascar","MW"=>"Malawi","MY"=>"Malaysia","MV"=>"Maldives","ML"=>"Mali","MT"=>"Malta","MH"=>"Marshall Islands (the)","MQ"=>"Martinique","MR"=>"Mauritania","MU"=>"Mauritius","YT"=>"Mayotte","MX"=>"Mexico","FM"=>"Micronesia (Federated States of)","MD"=>"Moldova (the Republic of)","MC"=>"Monaco","MN"=>"Mongolia","ME"=>"Montenegro","MS"=>"Montserrat","MA"=>"Morocco","MZ"=>"Mozambique","MM"=>"Myanmar","NA"=>"Namibia","NR"=>"Nauru","NP"=>"Nepal","NL"=>"Netherlands (the)","NC"=>"New Caledonia","NZ"=>"New Zealand","NI"=>"Nicaragua","NE"=>"Niger (the)","NG"=>"Nigeria","NU"=>"Niue","NF"=>"Norfolk Island","MP"=>"Northern Mariana Islands (the)","NO"=>"Norway","OM"=>"Oman","PK"=>"Pakistan","PW"=>"Palau","PS"=>"Palestine, State of","PA"=>"Panama","PG"=>"Papua New Guinea","PY"=>"Paraguay","PE"=>"Peru","PH"=>"Philippines (the)","PN"=>"Pitcairn","PL"=>"Poland","PT"=>"Portugal","PR"=>"Puerto Rico","QA"=>"Qatar","MK"=>"Republic of North Macedonia","RO"=>"Romania","RU"=>"Russian Federation (the)","RW"=>"Rwanda","RE"=>"Réunion","BL"=>"Saint Barthélemy","SH"=>"Saint Helena, Ascension and Tristan da Cunha","KN"=>"Saint Kitts and Nevis","LC"=>"Saint Lucia","MF"=>"Saint Martin (French part)","PM"=>"Saint Pierre and Miquelon","VC"=>"Saint Vincent and the Grenadines","WS"=>"Samoa","SM"=>"San Marino","ST"=>"Sao Tome and Principe","SA"=>"Saudi Arabia","SN"=>"Senegal","RS"=>"Serbia","SC"=>"Seychelles","SL"=>"Sierra Leone","SG"=>"Singapore","SX"=>"Sint Maarten (Dutch part)","SK"=>"Slovakia","SI"=>"Slovenia","SB"=>"Solomon Islands","SO"=>"Somalia","ZA"=>"South Africa","GS"=>"South Georgia and the South Sandwich Islands","SS"=>"South Sudan","ES"=>"Spain","LK"=>"Sri Lanka","SD"=>"Sudan (the)","SR"=>"Suriname","SJ"=>"Svalbard and Jan Mayen","SE"=>"Sweden","CH"=>"Switzerland","SY"=>"Syrian Arab Republic","TW"=>"Taiwan (Province of China)","TJ"=>"Tajikistan","TZ"=>"Tanzania, United Republic of","TH"=>"Thailand","TL"=>"Timor-Leste","TG"=>"Togo","TK"=>"Tokelau","TO"=>"Tonga","TT"=>"Trinidad and Tobago","TN"=>"Tunisia","TR"=>"Turkey","TM"=>"Turkmenistan","TC"=>"Turks and Caicos Islands (the)","TV"=>"Tuvalu","UG"=>"Uganda","UA"=>"Ukraine","AE"=>"United Arab Emirates (the)","GB"=>"United Kingdom of Great Britain and Northern Ireland (the)","UM"=>"United States Minor Outlying Islands (the)","US"=>"United States of America (the)","UY"=>"Uruguay","UZ"=>"Uzbekistan","VU"=>"Vanuatu","VE"=>"Venezuela (Bolivarian Republic of)","VN"=>"Viet Nam","VG"=>"Virgin Islands (British)","VI"=>"Virgin Islands (U.S.)","WF"=>"Wallis and Futuna","EH"=>"Western Sahara","YE"=>"Yemen","ZM"=>"Zambia","ZW"=>"Zimbabwe","AX"=>"Åland Islands"
            );

        return $countries;
    }

}

