<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Models\ShopModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Core\Config;
use Konwersatorium\Mailer\MailerBuy;

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
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
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
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
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
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('offer-special-details.twig', $properties);
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
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('offer-buy.twig', $properties);
//return $this->render('test-offer-buy.twig', $properties);

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
                        if($processed = true /* $mailerBuy->isEmailSend() */) {
                            
                        } else $errorMessage = "Ups! Coś poszło nie tak. Spróbuj do nas zadzwonić!"; 
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

            // create Reservation in reservation table
            $res_no = ""; // create variable to store res no
            // TODO the same as above - validation of data shoul not be in mailer class
            if ($processed) {
                // check availibility of an item
                // process email
                $offer_id = $mailerBuyData['offer_id'];
                $name = $mailerBuyData['name'];
                $email = $mailerBuyData['email'];
                $offer_reservation_last_id = $shopModel->createOfferReservation($offer_id, $name, $email);
                // get reservation number from database
                $res_no = $shopModel->getResNo($offer_reservation_last_id);

                // decrement the quantity of available item
                $shopModel->updateItemQuantity($offer_id, $quantity - 1);
            }

// chk value
$chkParametersChain = "ifhFAPPwsaml1GV5u5JaqUBkqshCqhfa" . "730320" . "400" . "PLN" . "Pakiet 4 lekcji"
     . "http://testwebproject.eu/" . "0" . "Powrót do Konwersatorium Muzycznego";

$chkValue = hash('sha256', $chkParametersChain);


            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerBuyArr' => $offerBuyArr,
                'contactMainArr' => $contactMainArr,
                'contactDetailsArr' => $contactDetailsArr,
                'recaptchaConfig' => $recaptchaConfig,
                'chkValue' => $chkValue,
                'errorMessage' => $errorMessage,
                'mailerBuyData' => $mailerBuyData,
                'res_no' => $res_no
                ];
        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
        }
        if($processed) {
            return $this->render('offer-payment.twig', $properties);
        } else {
            // TODO: redirect to url: offer buy
            return $this->render('offer-buy.twig', $properties); // display offer-buy page with error message
        }
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
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('offer-payment-policy.twig', $properties);
    }

}

