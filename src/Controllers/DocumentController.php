<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Exceptions\NotFoundException;

class DocumentController extends AbstractController {

    public function getPrivacyPolicy() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested document does not exist.');
        }

        return $this->render('policy-privacy.twig', $properties);
    }

    public function getOnlinelearningPolicy() {
        // instantiate array
        $properties = array();
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested document does not exist.');
        }

        header('Content-Type: application/pdf');
//        header('Content-Disposition: inline; filename="' . $filename . '"');
//        header('Content-Disposition: attachment'; filename="document_name");
//        header('Content-Transfer-Encoding: binary');
//        header('Accept-Ranges: bytes');
        echo file_get_contents(__DIR__ . '/../../documents/onlinelearning.pdf');

    }


}

