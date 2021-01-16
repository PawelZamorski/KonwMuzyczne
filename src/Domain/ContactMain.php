<?php

namespace Konwersatorium\Domain;

class ContactMain { 
    private $heading_3;
    private $heading_2;
    private $address;
    private $branch_address;
    private $phone;

    public function __construct($heading_3, $heading_2, $address, $branch_address, $phone) {
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
        $this->address = $address;
        $this->branch_address = $branch_address;
        $this->phone = $phone;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getBranchAddress() {
        return $this->branch_address;
    }

    public function getPhone() {
        return $this->phone;
    }

}
