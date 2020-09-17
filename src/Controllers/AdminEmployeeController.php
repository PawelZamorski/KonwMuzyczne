<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\EmployeeModel;
use Konwersatorium\Exceptions\NotFoundException;

class AdminEmployeeController extends AbstractController {

    public function getAllEmployee($lang) {
        // instantiate array
        $properties = array();

        try {
            // get employee data
            $employeeModel = new EmployeeModel($this->conn);
            $employeeArr = $employeeModel->getAll($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'employeeArr' => $employeeArr
                ];

        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('admin/admin-employee-all.twig', $properties);
    }
    
    public function getEmployeeById($lang, $employee_id) {
        // instantiate array
        $properties = array();

        try {
            // get employee data
            $employeeModel = new EmployeeModel($this->conn);
            $employeeArr = $employeeModel->getEmployeeById($lang, $employee_id);
            $courseNamesArr = $employeeModel->getAllCourseNames($lang);
            $positionsArr = $employeeModel->getAllPositions($lang);
            $specializationsArr = $employeeModel->getAllSpecializations($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'employeeArr' => $employeeArr,
                'courseNamesArr' => $courseNamesArr,
                'positionsArr' => $positionsArr,
                'specializationsArr' => $specializationsArr
                ];

        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);
            
        }

        return $this->render('admin/admin-employee-details.twig', $properties);
    }

    public function updateEmployeeById($lang, $employee_id) {
        try {
            // get employee data
            $employeeModel = new EmployeeModel($this->conn);
            $message = $employeeModel->updateEmployeeById($lang, $employee_id);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/teacher/$employee_id";
            header("Location: http://$host$uri");
            exit;
            
        } catch (NotFoundException $e) {
//            $this->log->warn('Customer email not found: ' . $email);
            $errorController = new ErrorController($this->request);
            $errorController->notFound($lang);            
        }
    }

}

