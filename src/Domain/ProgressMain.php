<?php

namespace Konwersatorium\Domain;

class ProgressMain {
    private $heading_3;
    private $heading_2;
    private $button;
    private $short_desc;
    private $long_desc;

    public function __construct($heading_3, $heading_2, $button, $short_desc, $long_desc) {
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
        $this->button = $button;
        $this->short_desc = $short_desc;
        $this->long_desc = $long_desc;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

    public function getButton() {
        return $this->button;
    }

    public function getShortDesc() {
        return $this->short_desc;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

}
