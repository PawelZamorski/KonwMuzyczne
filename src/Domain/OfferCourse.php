<?php

namespace Konwersatorium\Domain;

class OfferCourse {
    // courses table
    private $id;
    private $code;
    private $common_desc_id;
    private $img_thumbnail;
    private $movie;
    // courses_translation table
    private $course_name;
    private $heading_3;
    private $button;
    private $long_desc;
    private $short_desc;
    private $img;

    public function __construct($id, $code, $common_desc_id, $img_thumbnail, $movie, 
            $course_name, $heading_3, $button, $long_desc, $short_desc, $img) {
        $this->id = $id;
        $this->code = $code;
        $this->common_desc_id = $common_desc_id;
        $this->img_thumbnail = $img_thumbnail;
        $this->movie = $movie;
        $this->course_name = $course_name;
        $this->heading_3 = $heading_3;
        $this->button = $button;
        $this->long_desc = $long_desc;
        $this->short_desc = $short_desc;
        $this->img = $img;
    }

    public function getId() {
        return $this->id;
    }
 
    public function getCode() {
        return $this->code;
    }

    public function getCommonDescId() {
        return $this->common_desc_id;
    }

    public function getImgThumbnail() {
        return $this->img_thumbnail;
    }

    public function getMovie() {
        return $this->movie;
    }

    public function getCourseName() {
        return $this->course_name;
    }

    public function getHeading3() {
        return $this->heading_3;
    }

    public function getButton() {
        return $this->button;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

    public function getShortDesc() {
        return $this->short_desc;
    }

    public function getImg() {
        return $this->img;
    }

    /* This is the static comparing function: sot on $id */
    public static function comparator($a, $b)
    {
        if ($a->getId() == $b->getId()) {
            return 0;
        }
        return ($a->getId() > $b->getId()) ? +1 : -1;
    }

}