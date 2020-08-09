<?php

namespace Konwersatorium\Domain;

class Offer {
    private $offer_id;
    private $name;
    private $category;
    private $type;
    private $short_desc;
    private $common_desc;
    private $long_desc;
    private $img;
    private $img_thumbnail;
    private $movie;

    public function __construct($offer_id, $name, $category, $type, $short_desc, $common_desc, $long_desc, $img, $img_thumbnail, $movie) {
        $this->offer_id = $offer_id;
        $this->name = $name;
        $this->category = $category;
        $this->type = $type;
        $this->shortDesc = $short_desc;
        $this->common_desc = $common_desc;
        $this->long_desc = $long_desc;
        $this->img = $img;
        $this->img_thumbnail = $img_thumbnail;
        $this->movie = $movie;
    }

    public function getOfferId() {
        return $this->offer_id;
    }
 
    public function getName() {
        return $this->name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getType() {
        return $this->type;
    }

    public function getShortDesc() {
        return $this->shortDesc;
    }

    public function getCommonDesc() {
        return $this->common_desc;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

    public function getImg() {
        return $this->img;
    }

    public function getImgThumbnail() {
        return $this->img_thumbnail;
    }

    public function getMovie() {
        return $this->movie;
    }

}