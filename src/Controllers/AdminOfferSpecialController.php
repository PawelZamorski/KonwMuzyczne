<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\OfferSpecialModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Services\Authentication;
use Konwersatorium\Core\Request;

// OK
class AdminOfferSpecialController extends AbstractController {

    public function __construct(Request $request) {
        parent::__construct($request);
        session_start();
    }

    public function getOfferSpecialAll($lang) {
        // instantiate array
        $properties = array();

        try {
            // get data
            $offerSpecialModel = new OfferSpecialModel($this->conn);
            $offerSpecialAll = $offerSpecialModel->getOfferSpecialAll($lang);
        
            // set up properties
            $properties = [
                'lang' => $lang,
                'offerSpecialAll' => $offerSpecialAll
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerSpecial-all.twig', $properties);            
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }
    

    public function getOfferSpecialById($lang, $offer_special_id) {
        // instantiate array
        $properties = array();

        try {
            // get employee data
            $offerSpecialModel = new OfferSpecialModel($this->conn);
            $offerSpecial = $offerSpecialModel->getOfferSpecialById($lang, $offer_special_id);

            // set up properties
            $properties = [
                'lang' => $lang,
                'offerSpecial' => $offerSpecial,
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerSpecial-update.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
                ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function updateOfferSpecialById($lang, $offer_special_id) {
        try {
            // get employee data
            $offerSpecialModel = new OfferSpecialModel($this->conn);
            // TODO: display message
            $message = $offerSpecialModel->updateOfferSpecialById($lang, $offer_special_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerSpecial/$offer_special_id";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function deleteOfferSpecialById($lang, $offer_special_id) {
        try {
            // delete employee data
            $offerSpecialModel = new OfferSpecialModel($this->conn);
            // TODO: display message
            $message = $offerSpecialModel->deleteOfferSpecialById($lang, $offer_special_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerSpecial";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function openCreateOfferSpecialForm($lang) {
        // instantiate array
        $properties = array();

        // always use pl language for create form
        $lang = 'pl';

        // set up properties
        $properties = [
            'lang' => $lang
        ];

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerSpecial-create-form.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function createOfferSpecial($lang) {
        try {
            // delete employee data
            $offerSpecialModel = new OfferSpecialModel($this->conn);
            // TODO: display message
            $message = $offerSpecialModel->createOfferSpecial($lang);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerSpecial";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);

        // TODO use general error or create specific one    
        } catch (NotFoundException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    private function isLoggedIn() {
        // TODO move authentication to parent class, so it will be done for all admin controllers
        // authentication service to login
        $auth = new Authentication;
        return $auth->isLoggedIn();
    }

}

