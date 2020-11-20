<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Exceptions\NotFoundException;

class ErrorController extends AbstractController {
    public function notFound($lang) {
        // set up error message
        $errorMessage = 'We are sorry, but the page you are looking for does not exist.​';
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // set up properties
            $properties = ['menuArr' => $menuArr, 'errorMessage' => $errorMessage];
        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            // set up properties
            $properties = ['errorMessage' => $errorMessage. ' NotFoundException Test'];
            return $this->render('error.twig', $properties);
        } catch (Exception $e) {
            $this->log->error('Exception: ' . $e);
            $properties = ['errorMessage' => $errorMessage. ' Exception test'];
            return $this->render('error.twig', $properties);
        }
        return $this->render('error.twig', $properties);
    }

    public function notFoundWithMessage($lang, $extraErrorMessage) {
        // set up error message
        $errorMessage = 'We are sorry, but the page you are looking for does not exist.​
        ' . $extraErrorMessage;

        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // set up properties
            $properties = ['menuArr' => $menuArr, 'errorMessage' => $errorMessage];
        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            // set up properties
            $properties = ['errorMessage' => $errorMessage. 'Error details: requested language does not exist.'];
            return $this->render('error.twig', $properties);
        } catch (Exception $e) {
            $this->log->error('Exception: ' . $e);
            $properties = ['errorMessage' => $errorMessage. ' Exception details: somethign went wrong. Please  contact administrator.'];
            return $this->render('error.twig', $properties);
        }
        return $this->render('error.twig', $properties);
    }

}