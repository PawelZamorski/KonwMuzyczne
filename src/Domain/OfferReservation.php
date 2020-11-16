<?php

namespace Konwersatorium\Domain;

class OfferReservation {
    private $id;
    private $offer_id;
    private $name;
    private $email;
    private $res_no;
    private $res_date;
    private $res_active;
    private $res_paid;

    public function __construct($id, $offer_id, $name, $email, $res_no, $res_date, $res_active, $res_paid) {
        $this->id = $id;
        $this->offer_id = $offer_id;
        $this->name = $name;
        $this->email = $email;
        $this->res_no = $res_no;
        $this->res_date = $res_date;
        $this->res_active = $res_active;
        $this->res_paid = $res_paid;
    }

    public function getId() {
        return $this->id;
    }

    public function getOfferId() {
        return $this->offer_id;
    }

    public function getName() {
        return $this->name;
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

}
