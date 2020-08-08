<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\BannerModel;
use Konwersatorium\Models\InfoModel;
use Konwersatorium\Models\CounterModel;
use Konwersatorium\Models\ProgressMainModel;
use Konwersatorium\Models\ProgressStatModel;
use Konwersatorium\Models\FactsModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Exceptions\NotFoundException;

/* 
* Homepage Controller
* Homepage contains few models and domains
*/
class HomeController extends AbstractController {

    public function getAll() {
        return $this->getAllLang('pl'); // Use pl as default language
    }

    public function getAllLang($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get banner data
            $bannerModel = new BannerModel($this->conn);
            $bannerArr = $bannerModel->getAllLang($lang);

            // get banner data
            $infoModel = new InfoModel($this->conn);
            $infoArr = $infoModel->getAllLang($lang);

            // get counter data
            $counterModel = new CounterModel($this->conn);
            $counterArr = $counterModel->getAllLang($lang);

            // get progress data
            $progressMainModel = new ProgressMainModel($this->conn);
            $progressMainArr = $progressMainModel->getAllLang($lang);

            $progressStatModel = new ProgressStatModel($this->conn);
            $progressStatArr = $progressStatModel->getAllLang($lang);

            // get facts data
            $factsModel = new FactsModel($this->conn);
            $factsArr = $factsModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);

            // set up properties
            $properties = [
                'menuArr' => $menuArr, 
                'bannerArr' => $bannerArr,
                'infoArr' => $infoArr,
                'counterArr' => $counterArr,
                'progressMainArr' => $progressMainArr,
                'progressStatArr' => $progressStatArr,
                'factsArr' => $factsArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('home.twig', $properties);
    }

}