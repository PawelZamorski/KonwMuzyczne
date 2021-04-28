<?php

namespace Konwersatorium\Domain;

class OfferSpecial {
    private $id;
    private $languages_id;
    private $code;
    private $url;
    private $long_desc;
    private $heading_3;
    private $heading_2;
    private $img;

    public function __construct($id, $languages_id, $code, $url, $long_desc, $heading_3, $heading_2, $img) {
        $this->id = $id;
        $this->languages_id = $languages_id;
        $this->code = $code;
        $this->url = $url;
        $this->long_desc = $long_desc;
        $this->heading_3 = $heading_3;
        $this->heading_2 = $heading_2;
        $this->img = $img;
    }

    public function getId() {
        return $this->id;
    }

    public function getLanguagesId() {
        return $this->languages_id;
    }

    public function getCode() {
        return $this->code;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getHeading2() {
        return $this->heading_2;
    }

    public function getImg() {
        return $this->img;
    }

}
