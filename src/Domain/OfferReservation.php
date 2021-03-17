<?php

namespace Konwersatorium\Domain;

class OfferReservation {
    private $id;
    private $offer_id;
private $offer_category;
private $offer_name;
private $lang_code;
    private $name;
private $surname;
private $street;
private $town;
private $postcode;
private $country;
    private $email;
    private $res_no;
    private $res_date;
    private $res_active;
    private $res_paid;
    private $amount;
    private $currency;
private $lesson_type;

    public function __construct($id, $offer_id, $offer_category, $offer_name, $lang_code, $name,
            $surname, $street, $town, $postcode, $country, $email, $res_no, $res_date,
            $res_active, $res_paid, $amount, $currency, $lesson_type) {
                
        $this->id = $id;
        $this->offer_id = $offer_id;
        $this->offer_category = $offer_category;
        $this->offer_name = $offer_name;
        $this->lang_code = $lang_code;
        $this->name = $name;
        $this->surname = $surname;
        $this->street = $street;
        $this->town = $town;
        $this->postcode = $postcode;
        $this->country = $country;
        $this->email = $email;
        $this->res_no = $res_no;
        $this->res_date = $res_date;
        $this->res_active = $res_active;
        $this->res_paid = $res_paid;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->lesson_type = $lesson_type;

    }
    public function getId() {
        return $this->id;
    }

    public function getOfferId() {
        return $this->offer_id;
    }

    public function getOfferCategory() {
        return $this->offer_category;
    }

    public function getOfferName() {
        return $this->offer_name;
    }

    public function getLangCode() {
        return $this->lang_code;
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

    public function getResNo() {
        return $this->res_no;
    }

    public function getResDate() {
        return $this->res_date;
    }

    public function getResActive() {
        return $this->res_active;
    }

    public function getResPaid() {
        return $this->res_paid;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getLessonType() {
        return $this->lesson_type;
    }

}
