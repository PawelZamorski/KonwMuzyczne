<?php

namespace Konwersatorium\Domain;

class OfferCourse {
    // courses table
    private $id;
    private $code;
    private $course_name_id;
    private $common_desc_id;
    private $course_type_id;
    private $img_thumbnail;
    private $movie;
    // courses_translation table
    private $long_desc;
    private $short_desc;
    private $img;

    public function __construct($id, $code, $course_name_id, $common_desc_id, $course_type_id, $img_thumbnail, $movie, $long_desc, $short_desc, $img) {
        $this->id = $id;
        $this->code = $code;
        $this->course_name_id = $course_name_id;
        $this->common_desc_id = $common_desc_id;
        $this->course_type_id = $course_type_id;
        $this->img_thumbnail = $img_thumbnail;
        $this->movie = $movie;
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

    public function getCourseNameId() {
        return $this->course_name_id;
    }

    public function getCommonDescId() {
        return $this->common_desc_id;
    }

    public function getCourseTypeId() {
        return $this->course_type_id;
    }

    public function getImgThumbnail() {
        return $this->img_thumbnail;
    }

    public function getMovie() {
        return $this->movie;
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

}