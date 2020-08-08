<?php

namespace Konwersatorium\Domain;

class OfferCategory {
    private $category_id;
    private $category;
    private $img;

    public function __construct($category_id, $category, $img) {
        $this->category_id = $category_id;
        $this->category = $category;
        $this->img = $img;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getImg() {
        return $this->img;
    }

}
