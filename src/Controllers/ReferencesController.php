<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\ReferencesModel;
use Konwersatorium\Exceptions\NotFoundException;

class ReferencesController extends AbstractController {

    public function getRefByCategoryId($lang, $category_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $referencesModel = new ReferencesModel($this->conn);
            $referencesArr = $referencesModel->getRefByCategoryId($lang, $category_id);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'referencesArr' => $referencesArr
                ];

        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');
        }

        return $this->render('references-details.twig', $properties);
    }

}

