<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Models\ShopModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Core\Config;
use Konwersatorium\Mailer\MailerBuy;
use Konwersatorium\Services\PaymentPrzelewy24;

class OfferController extends AbstractController {
    
    public function getOfferById($lang, $offer_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerByIdArr = $offerModel->getOfferById($lang, $offer_id);
            
            // get button
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            $shopModel = new ShopModel($this->conn);
            // check availibility of an item
            $quantity = $shopModel->getItemQuantity($offer_id);


            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'quantity' => $quantity
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested offer does not exist.');
        }
        return $this->render('offer-details.twig', $properties);
    }

    public function getOfferByCategoryId($lang, $category_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerMainByCategoryArr = $offerModel->getOfferCategoryById($lang, $category_id);
            $offerByCategoryArr = $offerModel->getOfferByCategoryId($lang, $category_id);
            $offerMainArr = $offerModel->getOfferMain($lang);


            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainByCategoryArr' => $offerMainByCategoryArr,
                'offerByCategoryArr' => $offerByCategoryArr,
                'offerMainArr' => $offerMainArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');            
        }

        return $this->render('offer-category.twig', $properties);
    }

    public function getOfferSpecialDetails($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerSpecialArr = $offerModel->getOfferSpecial($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerSpecialArr' => $offerSpecialArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('offer-special-details.twig', $properties);
    }

    public function getOfferSpecialDetails_2($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer special data
            $offerModel = new OfferModel($this->conn);
            $offerSpecial_2_Arr = $offerModel->getOfferSpecial_2($lang);
            // get offerMain data
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);
            

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerSpecial_2_Arr' => $offerSpecial_2_Arr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('offer-special-details-2.twig', $properties);
    }

    public function getOfferSpecialDetails_3($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer special data
            $offerModel = new OfferModel($this->conn);
            $offerSpecial_3_Arr = $offerModel->getOfferSpecial_3($lang);
            // get offerMain data
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);
            

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerSpecial_3_Arr' => $offerSpecial_3_Arr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('offer-special-details-3.twig', $properties);
    }

    public function buyOfferById($lang, $offer_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerByIdArr = $offerModel->getOfferById($lang, $offer_id);
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get contactMain data
            $contactModel = new ContactModel($this->conn);
            $contactMainArr = $contactModel->getContactMain($lang);
            $contactDetailsArr = $contactModel->getContactDetails($lang);

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');

            $shopModel = new ShopModel($this->conn);
            // check availibility of an item
            $quantity = $shopModel->getItemQuantity($offer_id);


            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'contactMainArr' => $contactMainArr,
                'contactDetailsArr' => $contactDetailsArr,
                'recaptchaConfig' => $recaptchaConfig,
                'quantity' => $quantity
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }
        return $this->render('offer-buy.twig', $properties);
    }

    public function payOfferById($lang, $offer_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerByIdArr = $offerModel->getOfferById($lang, $offer_id);
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get contactMain data
            $contactModel = new ContactModel($this->conn);
            $contactMainArr = $contactModel->getContactMain($lang);
            $contactDetailsArr = $contactModel->getContactDetails($lang);

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');


            // run mailer and get message
            $processed = false;
            $errorMessage = "";
            // create variable to store res no
            $res_no = "";

            $mailerBuy = new MailerBuy();
            // get POST data as array, validates them
            // TODO refactor code, move validation of POST data to service
            // TODO move sending logic to MailerBuy, create method sendEmail()
            $mailerBuyData = $mailerBuy->getData();

            $shopModel = new ShopModel($this->conn);
            // check availibility of an item
            $quantity = $shopModel->getItemQuantity($offer_id);
            if($quantity > 0) {
                // send reservation email
                if($processed = $mailerBuy->isFormDataValid()) {
                    if($processed = $mailerBuy->isRecaptchaValid()) {
                        // create Reservation in reservation table
                        // check availibility of an item
                        // process email
                        $offer_id = $mailerBuyData['offer_id'];
                        $name = $mailerBuyData['name'];
                        $email = $mailerBuyData['email'];
                        // keep the language consistent over the payment process
                        $lang = $mailerBuyData['lang'];
                        // use lang to set up amount and currency
                        $amount = '40000'; // amount in polish grosze 
                        $currency = 'PLN';
                        if($lang == 'en' || $lang == 'vi' || $lang == 'zh') {
                            $amount = '9900'; // amount in cents
                            $currency = 'EUR';
                        }
                        // create description
                        $offer_category = $mailerBuyData['offer_category'];
                        $offer_name = $mailerBuyData['offer_name'];
                        $description = $offer_category . ' ' . $offer_name;
                        
                        $offer_reservation_last_id = $shopModel->createOfferReservation($offer_id, $name, $email, $amount, $currency, $description);
                        // get reservation number from database
                        $res_no = $shopModel->getResNo($offer_reservation_last_id);

                        // decrement the quantity of available item
                        $shopModel->updateItemQuantity($offer_id, $quantity - 1);

                        // send email
                        // set res_no and res_id in MailerBuy object to use it in isEmailSend
                        $mailerBuy->setResNo($res_no);
                        $mailerBuy->setResId($offer_reservation_last_id);
                        if($processed = $mailerBuy->isEmailSend()) {
                            // TODO -> check if correct i think that is is not correct, because you cannot clear POST that way, but you must redirect
                            // clear Post data to prevent from resubmission
                            $_POST[] = array();
                        } else {
                            $errorMessage = "Ups! Coś poszło nie tak. Spróbuj do nas zadzwonić!";
                            // Delete reservation from DB
                        } 
                    } else {
                        $errorMessage = "Captcha nie została potwierdzona.";
                    }
                } else {
                    $errorMessage = "Dane wpisane do formularza są niepoprawne. Spróbuj jeszcze raz!";
                }    
            } else {
                $processed = false;
                $errorMessage = "Oferta jest wyprzedana. Prosimy o kontakt telefoniczny z biurem sprzedaży.";
            }

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'contactMainArr' => $contactMainArr,
                'contactDetailsArr' => $contactDetailsArr,
                'recaptchaConfig' => $recaptchaConfig,
                'errorMessage' => $errorMessage,
                'mailerBuyData' => $mailerBuyData,
                'res_no' => $res_no,
                'res_id' => $offer_reservation_last_id
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
            // TODO: redirect to url: offer buy
            return $this->render('offer-buy.twig', $properties); // display offer-buy page with error message
        }
    }



    public function payOfferByIdResidResno($lang, $offer_id, $res_id, $res_no) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerByIdArr = $offerModel->getOfferById($lang, $offer_id);
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get contactMain data
            $contactModel = new ContactModel($this->conn);
            $contactMainArr = $contactModel->getContactMain($lang);
            $contactDetailsArr = $contactModel->getContactDetails($lang);

            // TODO: check if reservation is valid. If not valid (7 day) display page with offers and include message, that res is not valid but someone can make new reservation.
            // $errorMessage
            $processed = true;

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'contactMainArr' => $contactMainArr,
                'contactDetailsArr' => $contactDetailsArr,
//                'errorMessage' => $errorMessage,
                'mailerBuyData' => $mailerBuyData,
                'res_no' => $res_no,
                'res_id' => $res_id
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
            // TODO: redirect to url: offer buy
            return $this->render('offer-buy.twig', $properties); // display offer-buy page with error message
        }
    }



    public function paymentGateway($lang) {
        $this->log->info('OfferController::paymentGateway');

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
                throw new NotFoundException();
            }

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching faild. Token empty.');
        }
//            header("location: https://google.com"); // 302 id default, it is move temporary
 
        // if $response != 0 -> redirect to pzelewy24
//        header("Location: http://www.example.com/another-page.php", true, 301); // use 301 to move permanently
        header("location: https://sandbox.przelewy24.pl/trnRequest/" . $token); // 302 id default, it is move temporary
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





    public function getPaymentPolicy($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            $shopModel = new ShopModel($this->conn);
            $offerPaymentPolicy = $shopModel->getPaymentPolicy($lang);


            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerPaymentPolicy' => $offerPaymentPolicy
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('offer-payment-policy.twig', $properties);
    }
    
}

