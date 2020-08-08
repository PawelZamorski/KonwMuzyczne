<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\CourseModel;
use Konwersatorium\Models\MenuModel;
use Konwersatorium\Exceptions\NotFoundException;


class CourseController extends AbstractController {

    public function getAll() {
        $properties = ['errorMessage' => 'Get All course controller'];
        return $this->render('error.twig', $properties);
    }

    public function getById($lang, $id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get course data
            $courseModel = new CourseModel($this->conn);
            $course = $courseModel->getById($lang, $id);

            // set up properties
            $properties = ['menuArr' => $menuArr, 'course' => $course];
        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('courseDetails.twig', $properties);
    }
}