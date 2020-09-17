<?php

namespace Konwersatorium\Domain;

class Employee {
    private $emp_id;
    private $name;
    private $long_desc;
    private $img;
    private $img_thumbnail;
    private $course_name;
    private $position; // TODO: Position object
    private $specialization; // TODO: array of Specialization objects

    public function __construct($emp_id, $name, $long_desc, $img, $img_thumbnail, $course_name, $position, $specialization) {
        $this->emp_id = $emp_id;
        $this->name = $name;
        $this->long_desc = $long_desc;
        $this->img = $img;
        $this->img_thumbnail = $img_thumbnail;
        $this->course_name = $course_name;
        $this->position = $position;
        $this->specialization = $specialization;
    }

    public function getEmpId() {
        return $this->emp_id;
    }

    public function getName() {
        return $this->name;
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

    public function getCourseName() {
        return $this->course_name;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getSpecialization() {
        return $this->specialization;
    }

}
