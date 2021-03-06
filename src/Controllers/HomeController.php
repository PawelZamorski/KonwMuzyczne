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
use Konwersatorium\Models\FormModel;
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
            $offerMain = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategoryAll($lang);
            // get offerSpecialMain data
            $offerSpecialMainArr = $offerModel->getOfferSpecial($lang);
            // get offerSpecialMain_2 data
            $offerSpecialMain_2_Arr = $offerModel->getOfferSpecial_2($lang);
            // get offerSpecialMain_3 data
            $offerSpecialMain_3_Arr = $offerModel->getOfferSpecial_3($lang);


            // get employeeMain data
            $employeeModel = new employeeModel($this->conn);
            $employeeMainArr = $employeeModel->getEmployeeMain($lang);
            $employeeArr = $employeeModel->getEmployeeAll($lang);

            // get referencesMain data
            $referencesModel = new ReferencesModel($this->conn);
            $referencesMainArr = $referencesModel->getReferencesMain($lang);
            $referencesArr = $referencesModel->getAll($lang);

            // get contactMain data
            $contactModel = new ContactModel($this->conn);
            $contactMainArr = $contactModel->getContactMain($lang);

            // get form fields description data
            $formModel = new FormModel($this->conn);
            $formFieldsDesc = $formModel->getAllFields($lang);

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
                'offerMain' => $offerMain,
                'offerCategoryArr' => $offerCategoryArr,
                'offerSpecialMainArr' => $offerSpecialMainArr,
                'offerSpecialMain_2_Arr' => $offerSpecialMain_2_Arr,
                'offerSpecialMain_3_Arr' => $offerSpecialMain_3_Arr,
                'employeeMainArr' => $employeeMainArr,
                'employeeArr' => $employeeArr,
                'referencesMainArr' => $referencesMainArr,
                'referencesArr' => $referencesArr,
                'contactMainArr' => $contactMainArr,
                'formFieldsDesc' => $formFieldsDesc,
                'recaptchaConfig' => $recaptchaConfig
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('home.twig', $properties);
    }

}