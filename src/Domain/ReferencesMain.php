<?php

namespace Konwersatorium\Domain;

class ReferencesMain {
    private $heading_3;
    private $heading_2;
    private $button_1;
    private $button_2;
    private $button_3;
    private $partners;

    public function __construct($heading_3, $heading_2, $button_1, $button_2, $button_3, $partners) {
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
        $this->button_1 = $button_1;
        $this->button_2 = $button_2;
        $this->button_3 = $button_3;
        $this->partners = $partners;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

    public function getButton1() {
        return $this->button_1;
    }

    public function getButton2() {
        return $this->button_2;
    }

    public function getButton3() {
        return $this->button_3;
    }

    public function getPartners() {
        return $this->partners;
    }

}
