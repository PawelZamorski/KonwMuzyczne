<?php

namespace Konwersatorium\Domain;

class OfferBuy {
    private $heading_3_buy;
    private $heading_2_buy;
    private $heading_2_payment;
    private $heading_2_payment_1;
    private $heading_2_payment_2;
    private $heading_2_payment_3;
    private $info_main;
    private $info_buy;
    private $info_course;
    private $info_price;
    private $info_buy_contact;
    private $info_payment;
    private $button_confirm;
    private $button_pay;
    private $button_payment_policy;
    private $info_account;
    private $info_address;
    private $info_payment_gateway;

    public function __construct($heading_3_buy, $heading_2_buy, $heading_2_payment, $heading_2_payment_1, $heading_2_payment_2, $heading_2_payment_3, 
        $info_main, $info_buy, $info_course, $info_price, $info_buy_contact, $info_payment, $button_confirm, $button_pay, $button_payment_policy, $info_account, 
        $info_address, $info_payment_gateway) {
        
        $this->heading_3_buy = $heading_3_buy;
        $this->heading_2_buy = $heading_2_buy;
        $this->heading_2_payment = $heading_2_payment;
        $this->heading_2_payment_1 = $heading_2_payment_1;
        $this->heading_2_payment_2 = $heading_2_payment_2;
        $this->heading_2_payment_3 = $heading_2_payment_3;
        $this->info_main = $info_main;        
        $this->info_buy = $info_buy;
        $this->info_course = $info_course;
        $this->info_price = $info_price;
        $this->info_buy_contact = $info_buy_contact;
        $this->info_payment = $info_payment;
        $this->button_confirm = $button_confirm;
        $this->button_pay = $button_pay;
        $this->button_payment_policy = $button_payment_policy;
        $this->info_account = $info_account;
        $this->info_address = $info_address;
        $this->info_payment_gateway = $info_payment_gateway;
    }

    public function getHeading3Buy() {
        return $this->heading_3_buy;
    }

    public function getHeading2Buy() {
        return $this->heading_2_buy;
    }

    public function getHeading2Payment() {
        return $this->heading_2_payment;
    }

    public function getHeading2Payment1() {
        return $this->heading_2_payment_1;
    }

    public function getHeading2Payment2() {
        return $this->heading_2_payment_2;
    }

    public function getHeading2Payment3() {
        return $this->heading_2_payment_3;
    }

    public function getInfoMain() {
        return $this->info_main;
    }

    public function getInfoBuy() {
        return $this->info_buy;
    }

    public function getInfoCourse() {
        return $this->info_course;
    }

    public function getInfoPrice() {
        return $this->info_price;
    }

    public function getInfoBuyContact() {
        return $this->info_buy_contact;
    }
    
    public function getInfoPayment() {
        return $this->info_payment;
    }

    public function getButtonConfirm() {
        return $this->button_confirm;
    }

    public function getButtonPay() {
        return $this->button_pay;
    }

    public function getButtonPaymentPolicy() {
        return $this->button_payment_policy;
    }

    public function getInfoAccount() {
        return $this->info_account;
    }

    public function getInfoAddress() {
        return $this->info_address;
    }

    public function getInfoPaymentGateway() {
        return $this->info_payment_gateway;
    }

}
