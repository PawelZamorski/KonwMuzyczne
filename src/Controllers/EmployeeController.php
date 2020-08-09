<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\MenuModel;
use Konwersatorium\Models\EmployeeModel;
use Konwersatorium\Exceptions\NotFoundException;

class EmployeeController extends AbstractController {

    public function getEmployeeById($lang, $employee_id) {
        // instantiate array
        $properties = array();

        try {
            // get menu data
            $menuModel = new MenuModel($this->conn);
            $menuArr = $menuModel->getAllLang($lang);

            // get employee data
            $employeeModel = new EmployeeModel($this->conn);
            $employeeArr = $employeeModel->getEmployeeById($lang, $employee_id);

            // set up properties
            $properties = [
                'lang' => $lang,
                'menuArr' => $menuArr,
                'employeeArr' => $employeeArr
                ];

        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('employee-details.twig', $properties);
    }

}

