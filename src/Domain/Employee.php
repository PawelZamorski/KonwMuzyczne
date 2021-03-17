<?php

namespace Konwersatorium\Domain;

class Employee {
    // employee table
    private $id;
    private $full_name;
    private $img;
    private $img_thumbnail;
    // employee_translation table
    private $position;
    private $specialization;
    private $long_desc;

    public function __construct($id, $full_name, $img, $img_thumbnail, $position, $specialization, $long_desc) {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->img = $img;
        $this->img_thumbnail = $img_thumbnail;
        $this->position = $position;
        $this->specialization = $specialization;
        $this->long_desc = $long_desc;
    }

    public function getId() {
        return $this->id;
    }

    public function getFullName() {
        return $this->full_name;
    }

    public function getImg() {
        return $this->img;
    }

    public function getImgThumbnail() {
        return $this->img_thumbnail;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getSpecialization() {
        return $this->specialization;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

}
