<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Models\EmployeeModel;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Services\Authentication;
use Konwersatorium\Core\Request;

// OK
class AdminEmployeeController extends AbstractController {

    public function __construct(Request $request) {
        parent::__construct($request);
        session_start();
    }

    public function getEmployeeAll($lang) {
        // instantiate array
        $properties = array();

        try {
            // get employee data
            $employeeModel = new EmployeeModel($this->conn);
            $employeeArr = $employeeModel->getEmployeeAll($lang);

            // set up properties
            $properties = [
                'lang' => $lang,
                'employeeArr' => $employeeArr
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
                'lang' => $lang
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
            $employee = $employeeModel->getEmployeeById($lang, $employee_id);

            // set up properties
            $properties = [
                'lang' => $lang,
                'employee' => $employee,
                ];

        } catch (NotFoundException $e) {
            $this->log->warning('NotFoundException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, 'Error details: data fetching failed.');
        }

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-employee-update.twig', $properties);
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
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/teacher/$employee_id";
            header("Location: https://$host$uri");
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
            
            $host = $_SERVER['SERVER_NAME'];
            $uri = "/admin/$lang/teacher";
            header("Location: https://$host$uri");
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

        // set up properties
        $properties = [
            'lang' => $lang
        ];

        if($this->isLoggedIn()) {
            return $this->render('admin/admin-employee-create-form.twig', $properties);
        } else {
            // set up properties
            $properties = [
                'lang' => $lang
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
            
           $host = $_SERVER['SERVER_NAME'];
           $uri = "/admin/$lang/teacher";
           header("Location: https://$host$uri");
           exit;
            
        } catch (DbException $e) {
            $this->log->error('DbException: ' . $e);
            $errorController = new ErrorController($this->request);
            return $errorController->notFoundWithMessage($lang, $e);

        // TODO use general error or create specific one    
        } catch (NotFoundException $e) {
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

