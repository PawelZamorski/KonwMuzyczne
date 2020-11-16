<?php

namespace Konwersatorium\Domain;

class OfferPaymentPolicy {
    private $heading_3;
    private $heading_2;
    private $long_desc;

    public function __construct($heading_3, $heading_2, $long_desc) {
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
        $this->long_desc = $long_desc;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

}
