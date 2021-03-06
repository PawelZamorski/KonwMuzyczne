<?php

namespace Konwersatorium\Domain;

class OfferCategory {
    // category table
    private $id;
    private $code;
    private $sort_index;
    private $common_desc_id;
    private $img;
    // category_translation table
    private $heading_3;
    private $paragraph;
    private $button;
    private $category;
    private $long_desc;

    public function __construct($id, $code, $sort_index, $common_desc_id, $img, $heading_3, $paragraph, $button, $category, $long_desc) {
        $this->id = $id;
        $this->code = $code;
        $this->sort_index = $sort_index;
        $this->common_desc_id = $common_desc_id;
        $this->img = $img;
        $this->heading_3 = $heading_3;
        $this->paragraph = $paragraph;
        $this->button = $button;
        $this->category = $category;
        $this->long_desc = $long_desc;
    }

    public function getId() {
        return $this->id;
    }

    public function getCode() {
        return $this->code;
    }

    public function getSortIndex() {
        return $this->sort_index;
    }

    public function getCommonDescId() {
        return $this->common_desc_id;
    }

    public function getImg() {
        return $this->img;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getParagraph() {
        return $this->paragraph;
    }
    public function getButton() {
        return $this->button;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

    /* This is the static comparing function: sort on $sort_index */
    public static function comparator($a, $b)
    {
        if ($a->getSortIndex() == $b->getSortIndex()) {
            return 0;
        }
        return ($a->getSortIndex() > $b->getSortIndex()) ? +1 : -1;
    }
    
}
