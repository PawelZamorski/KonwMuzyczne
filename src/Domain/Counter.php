<?php

namespace Konwersatorium\Domain;

class Counter {
    private $heading_3;
    private $counter;
    private $short_desc;

    public function __construct($heading_3, $counter, $short_desc) {
        $this->heading_3 = $heading_3;
        $this->counter = $counter;
        $this->short_desc = $short_desc;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getCounter() {
        return $this->counter;
    }

    public function getShortDesc() {
        return $this->short_desc;
    }

}
