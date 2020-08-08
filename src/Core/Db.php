<?php

namespace Konwersatorium\Core;

use mysqli;

/* 
* The database connection class.
* It uses Singleton pattern.
* getInstance method returns mysqli connection object.
*/
class Db {
    private static $conn;

    private function __construct() {

    }

    public static function getConnection() {
        if(self::$conn == null) {
            self::$conn = self::connect();
        }
        return self::$conn;
    }

    private static function connect() {
        // Get config data
        $dbConfig = Config::getConfig()->get('db');
        // Create connection
        $conn = new mysqli($dbConfig['servername'], $dbConfig['user'], $dbConfig['password'], $dbConfig['dbname']);
        // Check connection
        if($conn->connect_error) { // TODO: check the following: $conn->connect_errno  Method connect_errno???
            // TODO: display Error page
            die("Connection failes: " . $conn->connect_error); // TODO die() vs exit()
        }
        // Good practice: SET NAMES 'utf8' for MySQL using set_charset method
        $conn->set_charset("utf8mb4");
        return $conn;
    }

}
