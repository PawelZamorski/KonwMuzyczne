<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\EmployeeModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Services\Authentication;

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
                'employeeArr' => $employeeArr,
                'test' => 'alamakota'
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-employee-all.twig', $properties);            
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
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-employee-details.twig', $properties);
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

    public function updateEmployeeById($lang, $employee_id) {
        try {
            // get employee data
            $employeeModel = new EmployeeModel($this->conn);
            // TODO: display message
            $message = $employeeModel->updateEmployeeById($lang, $employee_id);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/teacher/$employee_id";
            header("Location: http://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function deleteEmployeeById($lang, $employee_id) {
        try {
            // delete employee data
            $employeeModel = new EmployeeModel($this->conn);
            // TODO: display message
            $message = $employeeModel->deleteEmployeeById($lang, $employee_id);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/teacher";
            header("Location: http://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);
        }
    }

    public function openCreateEmployeeForm($lang) {
        // instantiate array
        $properties = array();

        // always use pl language for create employee form
        $lang = 'pl';

        try {
            // get employee data
            $employeeModel = new EmployeeModel($this->conn);
            $courseNamesArr = $employeeModel->getAllCourseNames($lang);
            $positionsArr = $employeeModel->getAllPositions($lang);
            $specializationsArr = $employeeModel->getAllSpecializations($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'courseNamesArr' => $courseNamesArr,
                'positionsArr' => $positionsArr,
                'specializationsArr' => $specializationsArr
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-employee-create-form.twig', $properties);
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

    public function createEmployee($lang) {
        try {
            // delete employee data
            $employeeModel = new EmployeeModel($this->conn);
            // TODO: display message
            $message = $employeeModel->createEmployee($lang);
            
            $host = $_SERVER['HTTP_HOST'];
            $uri = "/admin/$lang/teacher";
            header("Location: http://$host$uri");
            exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
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

