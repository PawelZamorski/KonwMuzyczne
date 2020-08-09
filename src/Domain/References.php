<?php

namespace Konwersatorium\Domain;

class References {
    private $category_id;
    private $heading_3;
    private $heading_2;
    private $short_desc;
    private $long_desc;
    private $button;

    public function __construct($category_id, $heading_3, $heading_2, $short_desc, $long_desc, $button) {
        $this->category_id = $category_id;
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
        $this->short_desc = $short_desc;
        $this->long_desc = $long_desc;
        $this->button = $button;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

    public function getShortDesc() {
        return $this->short_desc;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

    public function getButton() {
        return $this->button;
    }

}
