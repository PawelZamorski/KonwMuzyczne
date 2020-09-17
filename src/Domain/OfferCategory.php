<?php

namespace Konwersatorium\Domain;

class OfferCategory {
    private $category_id;
    private $category;
    private $heading_3_category;
    private $heading_3;
    private $heading_2;
    private $long_desc;
    private $common_desc;
    private $img;

    public function __construct($category_id, $category, $heading_3_category, $heading_3, $heading_2, $long_desc, $common_desc, $img) {
        $this->category_id = $category_id;
        $this->category = $category;
        $this->heading_3_category = $heading_3_category;
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
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

    public function getHeading3Category() {
        return $this->heading_3_category;
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

    public function getCommonDesc() {
        return $this->common_desc;
    }

    public function getImg() {
        return $this->img;
    }

}
