<?php

namespace Konwersatorium\Domain;

class Menu {
    private $sort_index;
    private $code;
    private $nav_link;

    public function __construct($sort_index, $code, $nav_link) {
        $this->sort_index = $sort_index;
        $this->code = $code;
        $this->nav_link = $nav_link;
    }

    public function getIndex() {
        return $this->sort_index;
    }

    public function getCode() {
        return $this->code;
    }

    public function getNavLink() {
        return $this->nav_link;
    }
}