<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Models\ShopModel;
use Konwersatorium\Models\FormModel;
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

            // TODO: move it to the correct condition 
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



    
}

