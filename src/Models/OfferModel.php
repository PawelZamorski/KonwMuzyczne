<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Offer;
use Konwersatorium\Domain\OfferMain;
use Konwersatorium\Domain\OfferCategory;
use Konwersatorium\Domain\OfferType;
use Konwersatorium\Domain\OfferSpecialMain;
use Konwersatorium\Domain\OfferCourse;
use Konwersatorium\Exceptions\NotFoundException;

class OfferModel extends AbstractModel {

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

    /*
    * Return offer category domain by category id
    */
    public function getOfferCategoryById($lang, $category_id) {
        $query = "SELECT  category.id, category_translation.category, cht.heading_3_category, cht.heading_3, cht.heading_2, category_translation.long_desc, common_desc_translation.common_desc, category.img  
        FROM category, category_translation, common_desc_translation, courses_heading_translation as cht, languages 
        WHERE category.id = ?
        AND category.common_desc_id=common_desc_translation.common_desc_id
        AND common_desc_translation.languages_id = languages.id
    
        AND category_translation.category_id = category.id
        AND category_translation.languages_id = languages.id
        
        AND cht.languages_id = languages.id

        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $category_id, $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new OfferCategory($row['id'], $row['category'], $row['heading_3_category'], $row['heading_3'], $row['heading_2'], $row['long_desc'], $row['common_desc'], $row['img']);
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
            array_push($itemArr, new OfferCategory($row['id'], $row['category'], '', '', '', '', '', $row['img']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    // associative array: key - offer category id; value - category
    public function parseOfferCategoryArrToAssociativeArr($offerCategoryArr) {
        $tempArr = array();
        foreach ($offerCategoryArr as $value) {
            $tempArr[$value->getCategoryId()] = $value->getCategory();
        }
        return $tempArr;
    }

    public function getAllCommonDescAsAssociateArr($lang) {
        $itemArr = array();

        $query = "SELECT common_desc_id, common_desc
        FROM common_desc_translation, languages
        WHERE common_desc_translation.languages_id = languages.id
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            $itemArr[$row['common_desc_id']] = $row['common_desc'];
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getAllOfferTypes($lang) {
        $itemArr = array();

        $query = "SELECT course_type_id, type 
        FROM course_type_translation, languages
        WHERE course_type_translation.languages_id = languages.id
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new OfferType($row['course_type_id'], $row['type']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getOfferByCategoryId($lang, $category_id) {
        $itemArr = array();

        $query = "SELECT offer.id as offer_id, course_name_translation.course_name, courses_translation.long_desc, courses_translation.short_desc, courses.img, courses.img_thumbnail, courses.movie, common_desc_translation.common_desc, category_translation.category, course_type_translation.type 
            FROM courses, courses_translation, offer, course_name_translation, category, category_translation, course_type_translation, common_desc_translation, languages
            WHERE offer.category_id=?
            AND offer.category_id = category.id
            AND offer.courses_id = courses.id 

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
        $stmt->bind_param('is', $category_id, $lang); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Offer($row['offer_id'], $row['course_name'], $row['category'], $row['type'], $row['short_desc'], $row['common_desc'], $row['long_desc'], $row['img'], $row['img_thumbnail'], $row['movie']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getOfferById($lang, $offer_id) {
        $query = "SELECT offer.id as offer_id, course_name_translation.course_name, courses_translation.long_desc, courses_translation.short_desc, courses_translation.img, courses.img_thumbnail, courses.movie, common_desc_translation.common_desc, category_translation.category, course_type_translation.type 
            FROM courses, courses_translation, offer, course_name_translation, category, category_translation, course_type_translation, common_desc_translation, languages
            WHERE offer.id=?
            AND offer.courses_id = courses.id 

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
        $stmt->bind_param('is', $offer_id, $lang); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new Offer($row['offer_id'], $row['course_name'], $row['category'], $row['type'], $row['short_desc'], $row['common_desc'], $row['long_desc'], $row['img'], $row['img_thumbnail'], $row['movie']);
    }

    public function getOfferSpecial($lang) {
        $query = "SELECT heading_3, heading_2, short_desc, long_desc, button, img
        FROM main_special_offer_translation, languages
        WHERE main_special_offer_translation.languages_id = languages.id
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

        return new OfferSpecialMain($row['heading_3'], $row['heading_2'], $row['short_desc'], $row['long_desc'], $row['button'], $row['img']);
    }

    public function getAllOffer($lang) {
        $itemArr = array();        

        $query = "SELECT offer.id as offer_id, category_translation.category, course_type_translation.type, course_name_translation.course_name, courses.img_thumbnail, courses.movie, 
        courses_translation.long_desc, courses_translation.short_desc, courses_translation.img,
        common_desc_translation.common_desc
        FROM offer, courses, category_translation, course_type_translation, course_name_translation, courses_translation, common_desc_translation, languages 
        WHERE offer.courses_id = courses.id 
        
        AND category_translation.category_id = offer.category_id 
        AND category_translation.languages_id = languages.id 
        
        AND course_type_translation.course_type_id = courses.course_type_id 
        AND course_type_translation.languages_id = languages.id 
        
        AND course_name_translation.course_name_id = courses.course_name_id 
        AND course_name_translation.languages_id = languages.id 
        
        AND courses_translation.courses_id = courses.id
        AND courses_translation.languages_id = languages.id
        
        AND common_desc_translation.common_desc_id = courses.common_desc_id
        AND common_desc_translation.languages_id = languages.id
        
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Offer($row['offer_id'], $row['course_name'], $row['category'], $row['type'], $row['short_desc'], $row['common_desc'], $row['long_desc'], $row['img'], $row['img_thumbnail'], $row['movie']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }

        return $itemArr;
    }

    public function updateOfferById($lang, $offer_id) {
        
        $category_id = $_POST['category_id']; // category_id is in offer table - do not update it
        $course_type_id = $_POST['course_type_id'];
        $course_name_id = $_POST['course_name_id'];
        $short_desc = $_POST['short_desc'];
        $common_desc_id = $_POST['common_desc_id'];
        $long_desc = $_POST['long_desc'];
        $img = $_POST['img'];
        $movie = $_POST['movie'];

        // Get courses_id from offer table
        $query = "SELECT courses_id
        FROM offer
        WHERE id = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('i', $offer_id); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        $courses_id = $row['courses_id'];

        // update main data
        // Step 2: Perform database query
        $sql = "UPDATE courses 
        SET course_type_id = $course_type_id,
        course_name_id = $course_name_id,
        common_desc_id = $common_desc_id,
        img = '$img',
        movie = '$movie'
        WHERE courses.id = $courses_id;";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->conn->error;
        }

        
        // Get main data
        // Step 2: Perform database query
        $sql = "UPDATE courses_translation 
        SET short_desc = '$short_desc',
        long_desc = '$long_desc'
        WHERE courses_translation.courses_id = $courses_id
        
        AND courses_translation.languages_id = 
            (SELECT id FROM languages WHERE code = '$lang');";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->conn->error;
        }
    }

    public function getAllCourses($lang) {
        $itemArr = array();        

        $query = "SELECT courses.id, courses.code, course_name_id, common_desc_id, course_type_id, img_thumbnail, movie, long_desc, short_desc, img
        FROM courses, courses_translation, languages
        WHERE courses_translation.courses_id = courses.id
        AND courses_translation.languages_id = languages.id
        
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new OfferCourse($row['id'], $row['code'], $row['course_name_id'], $row['common_desc_id'], $row['course_type_id'], $row['img_thumbnail'], $row['movie'], $row['long_desc'], $row['short_desc'], $row['img']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }

        return $itemArr;
    }

    public function createOffer($long) {
        $course_id = $_POST['course_id'];
        $category_id = $_POST['category_id'];

        // Insert main data
        // Step 2: Perform database query
        $sql = "INSERT INTO offer (`courses_id`, `category_id`)
        VALUES ($course_id, $category_id);";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error updating record: " . $this->conn->error;
        }

    }

    public function deleteOfferById($lang, $offer_id) {
        $sql = "DELETE FROM offer WHERE id = $offer_id;";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->conn->error;
        }

    }
}