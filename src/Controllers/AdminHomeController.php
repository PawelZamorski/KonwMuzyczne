<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Exceptions\NotFoundException;

/*
* Admin Homepage Controller
*/

class AdminHomeController extends AbstractController {
    
    public function loadHomepageLang($lang) {
        // instantiate array
        $properties = array();

        try {
            // set up properties
            $properties = [
                'lang' => $lang,
                ];

        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('admin/admin-home.twig', $properties);
    }
}
