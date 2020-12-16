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

}

