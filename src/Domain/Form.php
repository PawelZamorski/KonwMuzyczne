<?php

namespace Konwersatorium\Domain;

class Form {
    private $name;
    private $surname;
    private $street;
    private $town;
    private $postcode;
    private $country;
    private $email;
    private $message;
    private $currency_label;
    private $privacy_policy;
    private $learning_policy;
    private $button;

    public function __construct($name, $surname, $street, $town, $postcode, $country, $email, $message, $currency_label, $privacy_policy, $learning_policy, $button) {
        $this->name = $name;        
        $this->surname = $surname;
        $this->street = $street;
        $this->town = $town;
        $this->postcode = $postcode;
        $this->country = $country;
        $this->email = $email;
        $this->message = $message;
        $this->currency_label = $currency_label;
        $this->privacy_policy = $privacy_policy;
        $this->learning_policy = $learning_policy;
        $this->button = $button;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getTown() {
        return $this->town;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getCountry() {
        return $this->country;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getCurrencyLabel() {
        return $this->currency_label;
    }

    public function getPrivacyPolicy() {
        return $this->privacy_policy;
    }

    public function getLearningPolicy() {
        return $this->learning_policy;
    }

    public function getButton() {
        return $this->button;
    }

}
