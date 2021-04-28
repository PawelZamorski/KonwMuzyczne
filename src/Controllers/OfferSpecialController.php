<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferSpecialModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Exceptions\NotFoundException;

class OfferSpecialController extends AbstractController {

    public function getOfferSpecialById($lang, $offer_special_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $offerSpecialModel = new OfferSpecialModel($this->conn);
            $offerSpecial = $offerSpecialModel->getOfferSpecialById($lang, $offer_special_id);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMain = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategoryAll($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerSpecial' => $offerSpecial,
                'offerCategoryArr' => $offerCategoryArr,
                'offerMain' => $offerMain
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');            
        }

        return $this->render('offer-special.twig', $properties);
    }

}

