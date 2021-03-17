<?php

namespace Konwersatorium\Services;

use Konwersatorium\Core\Db;
use Konwersatorium\Models\AuthenticationModel;
use Konwersatorium\Exceptions\NotFoundException;

class Authentication {
    private $conn;

    public function __construct() {
        $this->conn = Db::getConnection();
    }

    public function login($user_name, $user_password) {
        if($this->isAuthenticated($user_name, $user_password)) {
            // Set session variables
            $_SESSION["user_name"] = $user_name;
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedIn() {
        // check if the session is active and $_Session user_name is set up
        if(!empty($_SESSION['user_name']) && (session_status() === PHP_SESSION_ACTIVE)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function logout() {
		session_destroy();
//		header("Location: /");
    }
    
    private function isAuthenticated($user_name, $user_password) {
        // get user from DB
        $authModel = new AuthenticationModel($this->conn);
        try{
            $userData = $authModel->getUserByName($user_name);
            if($userData->getUserPassword() == $user_password) {
                return true;
            } else {
                return false;
            }

        } catch (NotFoundException $e) {
            // TODO log data
            return false;
        }


        // if result > 0 return true

    }

}