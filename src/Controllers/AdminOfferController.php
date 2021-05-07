<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\OfferModel;
use Konwersatorium\Models\ContactModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Services\Authentication;
use Konwersatorium\Core\Request;
use Konwersatorium\Models\EmployeeModel;

class AdminOfferController extends AbstractController {
    
    public function __construct(Request $request) {
        parent::__construct($request);
        session_start();
    }

// NEW  ----------------------////////////////////


// OFFER

    public function getOfferAll($lang) {
        // instantiate array
        $properties = array();

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerArr = $offerModel->getOfferAll($lang);


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

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offer-all.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang,
                'userName' => 'default user name'
                ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }


    public function openCreateOfferForm($lang) {
        // instantiate array
        $properties = array();

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerCategoryArr = $offerModel->getOfferCategoryAll($lang);
            $coursesArr = $offerModel->getCoursesAll($lang);
            
            // set up properties
            $properties = [
                'lang' => $lang,
                'offerCategoryArr' => $offerCategoryArr,
                'coursesArr' => $coursesArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offer-create-form.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang,
                'userName' => 'default user name'
                ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function createOffer($lang) {
        try {
            // delete employee data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->createOffer($lang);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offer";
            header("Location: https://$host$uri");
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
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offer";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }



// COURSE

    public function getCoursesAll($lang) {
        // instantiate array
        $properties = array();

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $coursesArr = $offerModel->getCoursesAll($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'coursesArr' => $coursesArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCourse-all.twig', $properties);        
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
                ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function getCourseById($lang, $course_id) {
        // instantiate array
        $properties = array();

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $course = $offerModel->getCourseById($lang, $course_id);

            $commonDescArr = $offerModel->getCommonDescAll($lang);
 
            // set up properties
            $properties = [
                'lang' => $lang,
                'course' => $course,
                'commonDescArr' => $commonDescArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCourse-update.twig', $properties);        
        } else {
            // set up properties
            $properties = [
                'lang' => $lang,
                'userName' => 'default user name'
                ];
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }
    
    public function updateCourseById($lang, $course_id) {
        try {
            // update offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->updateCourseById($lang, $course_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCourse/$course_id";
            header("Location: httpss://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
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
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCourse";
            header("Location: https://$host$uri");
            exit;
            
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
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $commonDescArr = $offerModel->getCommonDescAll($lang);
            
            // set up properties
            $properties = [
                'lang' => $lang,
                'commonDescArr' => $commonDescArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCourse-create-form.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function createOfferCourse($lang) {
        try {
            // delete employee data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message

            $message = $offerModel->createOfferCourse($lang);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCourse";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }

    }



// CATEGORY
    public function getOfferCategoryAll($lang) {
        // instantiate array
        $properties = array();
        
        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerCategoryAll = $offerModel->getOfferCategoryAll($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'offerCategoryAll' => $offerCategoryAll
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCategory-all.twig', $properties);        
        } else {
            // set up properties
            $properties = [
                'lang' => $lang,
                'userName' => 'default user name'
                ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }
    
    public function getCategoryById($lang, $category_id) {
        // instantiate array
        $properties = array();

        try {
            // get data
            $offerModel = new OfferModel($this->conn);
            $category = $offerModel->getOfferCategoryById($lang, $category_id);

            $commonDescArr = $offerModel->getCommonDescAll($lang);
 
            // set up properties
            $properties = [
                'lang' => $lang,
                'category' => $category,
                'commonDescArr' => $commonDescArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCategory-update.twig', $properties);        
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }
    
    public function updateCategoryById($lang, $category_id) {
        try {
            // update offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->updateCategoryById($lang, $category_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCategory/$category_id";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function openCreateOfferCategoryForm($lang) {
        // instantiate array
        $properties = array();

        // always use pl language for create employee form
        $lang = 'pl';

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $commonDescArr = $offerModel->getCommonDescAll($lang);
            
            // set up properties
            $properties = [
                'lang' => $lang,
                'commonDescArr' => $commonDescArr
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCategory-create-form.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function createOfferCategory($lang) {
        try {
            // delete employee data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message

            $message = $offerModel->createOfferCategory($lang);
            echo "done!";
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCategory";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }

    }

    public function deleteCategoryById($lang, $category_id) {
        try {
            // delete offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->deleteCategoryById($lang, $category_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCategory";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function openCreateOfferCategorySortForm($lang) {
        // instantiate array
        $properties = array();

        // always use pl language for create employee form
        $lang = 'pl';

        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerCategoryAll = $offerModel->getOfferCategoryAll($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'offerCategoryAll' => $offerCategoryAll
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCategory-sort.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function updateCategorySortIndexById($lang, $category_id) {
        try {
            // update offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->updateCategorySortIndexById($lang, $category_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCategory/createOfferCategorySortForm";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }




// COMMON DESC
    public function getOfferCommonDescAll($lang) {
        // instantiate array
        $properties = array();
        
        try {
            // get offer data
            $offerModel = new OfferModel($this->conn);
            $offerCommonDescAll = $offerModel->getCommonDescAll($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'offerCommonDescAll' => $offerCommonDescAll
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCommonDesc-all.twig', $properties);        
        } else {
            // set up properties
            $properties = [
                'lang' => $lang,
                'userName' => 'default user name'
                ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }
    
    public function getCommonDescById($lang, $common_desc_id) {
        // instantiate array
        $properties = array();

        try {
            // get data
            $offerModel = new OfferModel($this->conn);
            $offer_common_desc = $offerModel->getCommonDescById($lang, $common_desc_id);

            // set up properties
            $properties = [
                'lang' => $lang,
                'offer_common_desc' => $offer_common_desc
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCommonDesc-update.twig', $properties);        
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }
    
    public function updateCommonDescById($lang, $common_desc_id) {
        try {
            // update offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->updateCommonDescById($lang, $common_desc_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCommonDesc/$common_desc_id";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function openCreateOfferCommonDescForm($lang) {
        // instantiate array
        $properties = array();

        // always use pl language for create employee form
        $lang = 'pl';

        try {
            
            // set up properties
            $properties = [
                'lang' => $lang
            ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-offerCommonDesc-create-form.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
            ];
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);            
        }
    }

    public function createOfferCommonDesc($lang) {
        try {
            // delete employee data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message

            $message = $offerModel->createCommonDesc($lang);
            echo "done!";
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCommonDesc";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }

    }

    public function deleteCommonDescById($lang, $common_desc_id) {
        try {
            // delete offer data
            $offerModel = new OfferModel($this->conn);
            // TODO: display message
            $message = $offerModel->deleteCommonDescById($lang, $common_desc_id);
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/offerCommonDesc";
            header("Location: https://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->warning('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }




    private function isLoggedIn() {
        // TODO move authentication to parent class, so it will be done for all admin controllers
        // authentication service to login
        $auth = new Authentication;
        return $auth->isLoggedIn();
    }


}

