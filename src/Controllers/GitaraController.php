<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Exceptions\NotFoundException;

class GitaraController extends AbstractController {

    public function get() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('gitaradodomu.twig', $properties);
    }

    public function getValentinesday() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-valentinesday.twig', $properties);
    }

    public function getWiolonczela() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-wiolonczelawarsztaty.twig', $properties);
    }

    public function getUkulele() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-ukulelewarsztaty.twig', $properties);
    }

    public function getSaksofon() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-saksofonwarsztaty.twig', $properties);
    }

    public function getSaksofonSaxholder() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-saksofon-saxholder.twig', $properties);
    }

    public function getGitara() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-gitarawarsztaty.twig', $properties);
    }

    public function getGitara2() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-gitarawarsztaty-2.twig', $properties);
    }


    public function getEnGitara() {
        // instantiate array
        $properties = array();
        $lang = 'en';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-en-gitarawarsztaty.twig', $properties);
    }

    public function getEnGitara2() {
        // instantiate array
        $properties = array();
        $lang = 'en';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-en-gitarawarsztaty-2.twig', $properties);
    }

    public function getEnGitara3() {
        // instantiate array
        $properties = array();
        $lang = 'en';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-en-gitarawarsztaty-3.twig', $properties);
    }

    public function getSpiew() {
        // instantiate array
        $properties = array();
        $lang = 'en';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('special-spiewwarsztaty.twig', $properties);
    }

}

