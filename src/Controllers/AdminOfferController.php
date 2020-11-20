<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;

// TODO: refactor -> create course model
use Konwersatorium\Models\EmployeeModel;


class AdminOfferController extends AbstractController {
    
    public function getAllOffer($lang) {
        // instantiate array
        $properties = array();

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerArr = $offerModel->getAllOffer($lang);
 
            // set up properties
            $properties = [
                'lang' => $lang,
                'offerArr' => $offerArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
        }

        return $this->render('admin/admin-offer-all.twig', $properties);
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
            $offerByIdArr = $offerModel->getOfferById($lang, $offer_id);

            $offerCategoryArr = $offerModel->getOfferCategory($lang);
            $offerCategoryAssociativeArr = $offerModel->parseOfferCategoryArrToAssociativeArr($offerCategoryArr);

            $commonDescArr = $offerModel->getAllCommonDescAsAssociateArr($lang);

            $offerTypesArr = $offerModel->getAllOfferTypes($lang);
            
            // TODO: refactor -> create Course name model
            // get all course names
            $employeeModel = new EmployeeModel($this->conn);
            $courseNamesArr = $employeeModel->getAllCourseNames($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerByIdArr' => $offerByIdArr,
                'offerCategoryArr' => $offerCategoryArr,
                'offerCategoryAssociativeArr' => $offerCategoryAssociativeArr,
                'commonDescArr' => $commonDescArr,
                'offerTypesArr' => $offerTypesArr,
                'courseNamesArr' => $courseNamesArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('admin/admin-offer-details.twig', $properties);
    }

    public function updateOfferById($lang, $offer_id) {
        try {
            // update offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->updateOfferById($lang, $offer_id);

            echo $message;
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/offer/$offer_id";
            header("Location: http://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function openCreateOfferForm($lang) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerCategoryArr = $offerModel->getOfferCategory($lang);
            $allCoursesArr = $offerModel->getAllCourses($lang);
            
            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'offerCategoryArr' => $offerCategoryArr,
                'allCoursesArr' => $allCoursesArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('admin/admin-offer-create-form.twig', $properties);
    }

    public function createOffer($lang) {
        try {
            // delete employee data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->createOffer($lang);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/offer";
            header("Location: http://$host$uri");
            exit;
           
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function deleteOfferById($lang, $offer_id) {
        try {
            // delete offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->deleteOfferById($lang, $offer_id);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/offer";
            header("Location: http://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function getAllCourses($lang) {
        // instantiate array
        $properties = array();

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $allCoursesArr = $offerModel->getAllCourses($lang);
 
            // set up properties
            $properties = [
                'lang' => $lang,
                'allCoursesArr' => $allCoursesArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('admin/admin-offerCourse-all.twig', $properties);        
    }

    public function getCourseById($lang, $course_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer data
            $offerModel = new OfferModel($this->conn);
            $courseArr = $offerModel->getCourseById($lang, $course_id);

            $commonDescArr = $offerModel->getAllCommonDescAsAssociateArr($lang);

            $offerTypesArr = $offerModel->getAllOfferTypes($lang);
            
            // TODO: refactor -> create Course name model
            // get all course names
            $employeeModel = new EmployeeModel($this->conn);
            $courseNamesArr = $employeeModel->getAllCourseNames($lang);
 
            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'courseArr' => $courseArr,
                'commonDescArr' => $commonDescArr,
                'offerTypesArr' => $offerTypesArr,
                'courseNamesArr' => $courseNamesArr

            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('admin/admin-offerCourse-details.twig', $properties);        
    }
    public function updateCourseById($lang, $course_id) {
        try {
            // update offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->updateCourseById($lang, $course_id);
/*
            echo $message;
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/offerCourse/$course_id";
            header("Location: http://$host$uri");
            exit;
*/            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function openCreateOfferCourseForm($lang) {
        // instantiate array
        $properties = array();

        // always use pl language for create employee form
        $lang = 'pl';

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get offer data
            $offerModel = new OfferModel($this->conn);

            $commonDescArr = $offerModel->getAllCommonDescAsAssociateArr($lang);

            $offerTypesArr = $offerModel->getAllOfferTypes($lang);
            
            // TODO: refactor -> create Course name model
            // get all course names
            $employeeModel = new EmployeeModel($this->conn);
            $courseNamesArr = $employeeModel->getAllCourseNames($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'commonDescArr' => $commonDescArr,
                'offerTypesArr' => $offerTypesArr,
                'courseNamesArr' => $courseNamesArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        return $this->render('admin/admin-offerCourse-create-form.twig', $properties);

    }

    public function createOfferCourse($lang) {
        try {
            // delete employee data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->createOfferCourse($lang);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/offerCourse";
            header("Location: http://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }

    }

    public function deleteCourseById($lang, $course_id) {
        try {
            // delete offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->deleteCourseById($lang, $course_id);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/offerCourse";
            header("Location: http://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }


}

