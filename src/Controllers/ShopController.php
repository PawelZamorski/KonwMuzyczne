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

// use Konwersatorium\Mailer\MailerBuy;
// use Konwersatorium\Services\PaymentPrzelewy24;

class ShopController extends AbstractController {

    public function getBuyFormByOfferId($lang, $offer_id) {
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

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');

            $shopModel = new ShopModel($this->conn);
            // check availibility of an item
            $quantity = $shopModel->getItemQuantity($offer_id);

            // get form fields description data
            $formModel = new FormModel($this->conn);
            $formFieldsDesc = $formModel->getAllFields($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'formFieldsDesc' => $formFieldsDesc,
                'recaptchaConfig' => $recaptchaConfig,
                'quantity' => $quantity
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

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerByIdArr = $offerModel->getOfferById($lang, $offer_id);
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');

            $shopModel = new ShopModel($this->conn);
            // check availibility of an item
            $quantity = $shopModel->getItemQuantity($offer_id);

            // get form fields description data
            $formModel = new FormModel($this->conn);
            $formFieldsDesc = $formModel->getAllFields($lang);


            // DATA FOR REDIRECTING TO PAYMENT
            // validate recaptcha
            $recaptchaValidator = new RecaptchaValidator();
            $isRecaptchaValid = $recaptchaValidator->isRecaptchaValid();

            if($isRecaptchaValid) {
                // validate form
                $formProcess = new FormProcess();
                // array of input fields names. Names must be the same as in form.
                $arrInputFields = array('offerId', 'offerCategory', 'offerName', 'name' ,'surname', 'street', 
                    'town', 'postcode', 'country', 'currency', 'email');
                $data = $formProcess->processForm($lang, $arrInputFields);
                // form values as an associated array
                $validationResult = $data['validatorResult'];

                // check availability of an item
                $offerId = intval($validationResult['offerId']->getValue()); // TODO: check if offerId is number
                $shopModel = new ShopModel($this->conn);

                $isFormValid = $data['isFormValid'];
                $quantity = $shopModel->getItemQuantity($offerId);
                $isProductAvailable = $quantity > 0;
            }


            // create reservation if form is valid and item is available
            if($isFormValid && $quantity > 0) {
                // parse validationResult to OfferReservation object
                $offerReservation = $formProcess->parseFormToOfferReservation($lang, $validationResult);
                // create reservation, get last id

                // return object OfferReservation with id
                $offerReservation = $shopModel->createOfferReservation_2($offerReservation);
                // decrement the quantity of available item
                $shopModel->updateItemQuantity($offerReservation->getOfferId(), $quantity - 1);

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
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'formFieldsDesc' => $formFieldsDesc,
                'recaptchaConfig' => $recaptchaConfig,
                'quantity' => $quantity,
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

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get OfferReservation
            $shopModel = new ShopModel($this->conn);
            $offerReservation = $shopModel->getOfferReservationById($res_id);

            // TODO: check if reservation is valid. If not valid (7 day) display page with offers and include message, that res is not valid but someone can make new reservation.
            // $errorMessage
            $processed = true;

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
            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerBuyArr' => $offerBuyArr,
                'offerReservation' => $offerReservation
                ];

            return $this->render('offer-payment.twig', $properties);
        } else {
            // TODO: if reservation is not valid, redirect to url: offer buy
            return $this->render('offer-buy-form.twig', $properties); // display offer-buy page with error message
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












    public function payOfferById_TEST($lang, $offer_id) {
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

            // get employee data
            $offerModel = new OfferModel($this->conn);
            $offerByIdArr = $offerModel->getOfferById($lang, $offer_id);
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');

            $shopModel = new ShopModel($this->conn);
            // check availibility of an item
            $quantity = $shopModel->getItemQuantity($offer_id);

            // get form fields description data
            $formModel = new FormModel($this->conn);
            $formFieldsDesc = $formModel->getAllFields($lang);

            // DATA FOR REDIRECTING TO PAYMENT
            // validate recaptcha
           $recaptchaValidator = new RecaptchaValidator();
           $isRecaptchaValid = $recaptchaValidator->isRecaptchaValid();

            if($isRecaptchaValid) {
                // validate form
                $formProcess = new FormProcess();
                // array of input fields names. Names must be the same as in form.
                $arrInputFields = array('offerId', 'offerCategory', 'offerName', 'name' ,'surname', 'street', 
                    'town', 'postcode', 'country', 'currency', 'email');
                $data = $formProcess->processForm($lang, $arrInputFields);
                // // form values as an associated array
                // $validationResult = $data['validatorResult'];

                // // check availability of an item
                // $offerId = intval($validationResult['offerId']->getValue()); // TODO: check if offerId is number
                // $shopModel = new ShopModel($this->conn);

                // $isFormValid = $data['isFormValid'];
                // $quantity = $shopModel->getItemQuantity($offerId);
                // $isProductAvailable = $quantity > 0;
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

        if(false) {
        } else {
            // redirect to form with error message

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'formFieldsDesc' => $formFieldsDesc,
                'recaptchaConfig' => $recaptchaConfig,
                'quantity' => $quantity,
                // data with error message
                'errorMessage' => $errorMessage
                ];
                            
            return $this->render('offer-buy-form.twig', $properties); // display offer-buy page with error message
        }
    }



}

