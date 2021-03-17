<?php

namespace Konwersatorium\Domain;

class Offer {
    private $id;
    private $courses_id;
    private $category_id;
    private $sort_index;
    private $code;

    public function __construct($id, $courses_id, $category_id, $sort_index, $code) {
        $this->id = $id;
        $this->courses_id = $courses_id;
        $this->category_id = $category_id;
        $this->sort_index = $sort_index;
        $this->code = $code;
    }

    public function getId() {
        return $this->id;
    }

    public function getCoursesId() {
        return $this->courses_id;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getSortIndex() {
        return $this->sort_index;
    }

    public function getCode() {
        return $this->code;
    }

    /* This is the static comparing function: sot on $id */
    public static function comparator($a, $b)
    {
        if ($a->getSortIndex() == $b->getSortIndex()) {
            return 0;
        }
        return ($a->getSortIndex() > $b->getSortIndex()) ? +1 : -1;
    }

}