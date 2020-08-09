<?php

namespace Konwersatorium\Domain;

class ContactMain { 
    private $heading_3;
    private $heading_2;
    private $email_name;
    private $email_email;
    private $email_message;
    private $button;

    public function __construct($heading_3, $heading_2, $email_name, $email_email, $email_message, $button) {
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
        $this->email_name = $email_name;
        $this->email_email = $email_email;
        $this->email_message = $email_message;
        $this->button = $button;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

    public function getEmailName() {
        return $this->email_name;
    }

    public function getEmailEmail() {
        return $this->email_email;
    }

    public function getEmailMessage() {
        return $this->email_message;
    }

    public function getButton() {
        return $this->button;
    }

}
