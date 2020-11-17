<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\BannerModel;
use Konwersatorium\Models\InfoModel;
use Konwersatorium\Models\CounterModel;
use Konwersatorium\Models\ProgressModel;
use Konwersatorium\Models\FactsModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\EmployeeModel;
use Konwersatorium\Models\ReferencesModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Core\Config;

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
            $progressModel = new ProgressModel($this->conn);
            $progressMainArr = $progressModel->getProgressMain($lang);
            $progressStatArr = $progressModel->getProgressStat($lang);

            // get facts data
            $factsModel = new FactsModel($this->conn);
            $factsArr = $factsModel->getAllLang($lang);

            // get offerMain data
            $offerModel = new OfferModel($this->conn);
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);
            // get offerSpecialMain data
            $offerSpecialMainArr = $offerModel->getOfferSpecial($lang);
            // get offerSpecialMain_2 data
            $offerSpecialMain_2_Arr = $offerModel->getOfferSpecial_2($lang);


            // get employeeMain data
            $employeeModel = new employeeModel($this->conn);
            $employeeMainArr = $employeeModel->getEmployeeMain($lang);
            $employeeArr = $employeeModel->getAll($lang);

            // get referencesMain data
            $referencesModel = new ReferencesModel($this->conn);
            $referencesMainArr = $referencesModel->getReferencesMain($lang);
            $referencesArr = $referencesModel->getAll($lang);

            // get contactMain data
            $contactModel = new ContactModel($this->conn);
            $contactMainArr = $contactModel->getContactMain($lang);
            $contactDetailsArr = $contactModel->getContactDetails($lang);

            // get config data - recaptcha site key
            $recaptchaConfig = Config::getConfig()->get('recaptcha');

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr, 
                'bannerArr' => $bannerArr,
                'infoArr' => $infoArr,
                'counterArr' => $counterArr,
                'progressMainArr' => $progressMainArr,
                'progressStatArr' => $progressStatArr,
                'factsArr' => $factsArr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr,
                'offerSpecialMainArr' => $offerSpecialMainArr,
                'offerSpecialMain_2_Arr' => $offerSpecialMain_2_Arr,
                'employeeMainArr' => $employeeMainArr,
                'employeeArr' => $employeeArr,
                'referencesMainArr' => $referencesMainArr,
                'referencesArr' => $referencesArr,
                'contactMainArr' => $contactMainArr,
                'contactDetailsArr' => $contactDetailsArr,
                'recaptchaConfig' => $recaptchaConfig
                ];

        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('home.twig', $properties);
    }

}