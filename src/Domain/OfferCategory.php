<?php

namespace Konwersatorium\Domain;

class OfferCategory {
    private $category_id;
    private $category;
    private $long_desc;
    private $common_desc;
    private $img;

    public function __construct($category_id, $category, $long_desc, $common_desc, $img) {
        $this->category_id = $category_id;
        $this->category = $category;
        $this->long_desc = $long_desc;
        $this->common_desc = $common_desc;
        $this->img = $img;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

    public function getCommonDesc() {
        return $this->common_desc;
    }

    public function getImg() {
        return $this->img;
    }

}
