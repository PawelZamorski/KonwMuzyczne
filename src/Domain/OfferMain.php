<?php

namespace Konwersatorium\Domain;

class OfferMain {
    private $heading_3;
    private $heading_2;

    public function __construct($heading_3, $heading_2) {
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

}
