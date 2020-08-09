<?php

namespace Konwersatorium\Domain;

class ContactDetail { 
    private $detail;

    public function __construct($detail) {
        $this->detail = $detail;
    }

    public function getDetail() {
        return $this->detail;
    }

}
