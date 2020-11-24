<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Services\Authentication;

/*
* Admin Homepage Controller
*/

class AdminHomeController extends AbstractController {
    
    public function loadHomepageLang($lang) {
        // instantiate array
        $properties = array();

        // TODO move authentication to parent class, so it will be done for all admin controllers
        // authentication service to login
        $auth = new Authentication;

        try {
            // set up properties
            $properties = [
                'lang' => $lang,
                'userName' => 'default user name'
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');            
        }

        if ($auth->isLoggedIn()) {
            // user is logged in, session is active
            return $this->render('admin/admin-home.twig', $properties);
        } else if(!empty($_POST['user_name']) & !empty($_POST['user_password'])) {
            if($auth->login($_POST['user_name'], $_POST['user_password'])) {
                $properties['userName'] = $_POST['user_name'];
                // user logged in successfully
                return $this->render('admin/admin-home.twig', $properties);
            } else {
                $properties['errorMessage'] = "Loggin failed";
                $properties['errorMessage'] .= " Invalid name/password";
                // user login failed
                return $this->render('admin/admin-login.twig', $properties);    
            }
        } else {
            // user is not logged in and did not send any post data
            return $this->render('admin/admin-login.twig', $properties);

        }
    }
}
