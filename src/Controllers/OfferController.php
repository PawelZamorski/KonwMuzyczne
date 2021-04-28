<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Models\ShopModel;
use Konwersatorium\Models\FormModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Core\Config;
use Konwersatorium\Mailer\MailerBuy;
use Konwersatorium\Services\PaymentPrzelewy24;

// OK but 2 TODO check
class OfferController extends AbstractController {
    
    // TODO: check
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
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('offer-special-details.twig', $properties);
    }

    public function getOfferSpecialDetails_2($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer special data
            $offerModel = new OfferModel($this->conn);
            $offerSpecial_2_Arr = $offerModel->getOfferSpecial_2($lang);
            // get offerMain data
            $offerMain = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategoryAll($lang);
            

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerSpecial_2_Arr' => $offerSpecial_2_Arr,
                'offerMain' => $offerMain,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('offer-special-details-2.twig', $properties);
    }

    // TODO: check
    public function getOfferSpecialDetails_3($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer special data
            $offerModel = new OfferModel($this->conn);
            $offerSpecial_3_Arr = $offerModel->getOfferSpecial_3($lang);
            // get offerMain data
            $offerMainArr = $offerModel->getOfferMain($lang);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);
            

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerSpecial_3_Arr' => $offerSpecial_3_Arr,
                'offerMainArr' => $offerMainArr,
                'offerCategoryArr' => $offerCategoryArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('offer-special-details-3.twig', $properties);
    }

    public function getCategoryById($lang, $category_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get category data
            $offerModel = new OfferModel($this->conn);
            $offerCategory = $offerModel->getOfferCategoryById($lang, $category_id);
            $offerCommonDesc = $offerModel->getCommonDescById($lang, $offerCategory->getCommonDescId());

            // get courses by category
            $offerByCategoryIdArr = $offerModel->getOfferByCategoryId($category_id);
            $offerCoursesByCategoryArr = array();
            foreach($offerByCategoryIdArr as $offer) {
                $offerCoursesByCategoryArr[$offer->getId()] = $offerModel->getCourseById($lang, $offer->getCoursesId());
            }

            $offerMain = $offerModel->getOfferMain($lang);  // headings

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerCategory' => $offerCategory,
                'offerCommonDesc' => $offerCommonDesc,
                'offerCoursesByCategoryArr' => $offerCoursesByCategoryArr,
                'offerMain' => $offerMain
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');            
        }

        return $this->render('offer-category.twig', $properties);
    }

    public function getOfferById($lang, $offer_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerById = $offerModel->getOfferById($offer_id);
            // get OfferCourseNEW based on courses_id
            $offerCourse = $offerModel->getCourseById($lang, $offerById->getCoursesId());
            $offerCommonDesc = $offerModel->getCommonDescById($lang, $offerCourse->getCommonDescId());
            // get OfferCategory based on category_id
            $offerCategory = $offerModel->getOfferCategoryById($lang, $offerById->getCategoryId());
            
            // get offer buy data (button in view)
            $offerBuyArr = $offerModel->getOfferBuy($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerId' => $offer_id,
                'offerCourse' => $offerCourse,
                'offerCommonDesc' => $offerCommonDesc,
                'offerCategory' => $offerCategory,
                'offerBuyArr' => $offerBuyArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested offer does not exist.');
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
            $offerCategory = $offerModel->getOfferCategoryById($lang, $category_id);
            $offerCommonDesc = $offerModel->getCommonDescById($lang, $offerCategory->getCommonDescId());

            $offerByCategoryArr = $offerModel->getOfferByCategoryId($lang, $category_id);
            $offerMain = $offerModel->getOfferMain($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerCategory' => $offerCategory,
                'offerCommonDesc' => $offerCommonDesc,
                'offerByCategoryArr' => $offerByCategoryArr,
                'offerMain' => $offerMain
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: requested category does not exist.');            
        }

        return $this->render('offer-category.twig', $properties);
    }

    
}

