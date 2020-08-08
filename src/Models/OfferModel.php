<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\OfferMain;
use Konwersatorium\Domain\OfferCategory;
use Konwersatorium\Exceptions\NotFoundException;

class OfferModel extends AbstractModel {

    public function getAll() {

    }

    public function getOfferMain($lang) {
        $query = "SELECT heading_3, heading_2, button, paragraph 
        FROM courses_heading_translation, languages
        WHERE courses_heading_translation.languages_id = languages.id
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new OfferMain($row['heading_3'], $row['heading_2'], $row['button'], $row['paragraph']);
    }

    public function getOfferCategory($lang) {
        $itemArr = array();

        $query = "SELECT category.id, category, img 
        FROM category, category_translation, languages
        WHERE category_translation.category_id = category.id
        AND category_translation.languages_id = languages.id
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new OfferCategory($row['id'], $row['category'], $row['img']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getOfferById($lang, $courseId) {
        $query = "SELECT course_name_translation.course_name, courses_translation.long_desc, courses_translation.short_desc, courses.img, courses.img_thumbnail, courses.movie, common_desc_translation.common_desc, category_translation.category, course_type_translation.type 
            FROM courses, courses_translation, offer, course_name_translation, category, category_translation, course_type_translation, common_desc_translation, languages
            WHERE offer.id=?
            AND courses.id = offer.courses_id 

            AND course_name_translation.course_name_id = courses.course_name_id
            AND course_name_translation.languages_id = languages.id

            AND courses_translation.courses_id = courses.id
            AND courses_translation.languages_id= languages.id

            AND course_type_translation.course_type_id = courses.course_type_id
            AND course_type_translation.languages_id = languages.id

            AND common_desc_translation.common_desc_id = courses.common_desc_id
            AND common_desc_translation.languages_id = languages.id

            AND category_translation.category_id = offer.category_id
            AND category_translation.languages_id = languages.id

            AND languages.code = ?;";

        // TODO: should be used try catch block ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $courseId, $lang); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new Course($row['course_name'], $row['category'], $row['type'], $row['short_desc'], $row['common_desc'], $row['long_desc'], $row['img'], $row['img_thumbnail'], $row['movie']);
    }

}