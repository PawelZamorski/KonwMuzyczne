<?php

namespace Konwersatorium\Services;

use Konwersatorium\Domain\ValidationResult;


//TODO Validator should be a static method
class Validator {

    public function __construct() {
    }

    public function validateText(string $text) {
        $isSuccess = false;
        $message = '';

        // sanitize data
        // remove whitespace and related characters from the beginning and end of the string
        $text = trim($text);
        $text = str_replace(array("\r","\n"),array(" "," "),$text);

        if(empty($text)){
            $isSuccess = false;
            $message = "* required field";
        } elseif ($text != filter_var($text, FILTER_SANITIZE_STRING)) {
            $isSuccess = false;
            $message = "* invalid field";
        } else {
            // Convert special characters to HTML entities
//            $text = filter_var($text, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // equivalent to htmlspecialchars($text) with ENT_QUOTES set
            $isSuccess = true;
            $message = "* correct";
        }
        return new ValidationResult($text, $isSuccess, $message);
    }

    public function validateEmail(string $email) {
        $isSuccess = false;
        $message = '';

        // sanitize data
        // remove whitespace and related characters from the beginning and end of the string
        $email = trim($email);

        // sanitize email
        $clean_email = filter_var($email,FILTER_SANITIZE_EMAIL);

        if ($email == $clean_email && filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email = $clean_email;
            $isSuccess = true;
            $message = "* correct";
        } else {
            $isSuccess = false;
            $message = "* invalid email";
        }
    
        return new ValidationResult($email, $isSuccess, $message);
    }

}

?>