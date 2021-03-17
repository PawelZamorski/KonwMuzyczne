<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\OfferMain;
use Konwersatorium\Domain\OfferSpecialMain; // TODO
use Konwersatorium\Domain\OfferCategory;
use Konwersatorium\Domain\Offer;
use Konwersatorium\Domain\OfferCourse;
use Konwersatorium\Domain\OfferCommonDesc;
use Konwersatorium\Domain\OfferBuy;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;
use Konwersatorium\Services\GoogleTranslate;

class OfferModel extends AbstractModel {

    // TODO check it
    public function getOfferSpecial($lang) {
        $query = "SELECT heading_3, heading_2, short_desc, long_desc, button, img
        FROM main_special_offer_translation, languages
        WHERE main_special_offer_translation.languages_id = languages.id
        AND languages.code = ?;";

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

    public function getOfferSpecial_2($lang) {
        $query = "SELECT heading_3, heading_2, short_desc, long_desc, button, img
        FROM special_offer_2_translation, languages
        WHERE special_offer_2_translation.languages_id = languages.id
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

    public function getOfferSpecial_3($lang) {
        $query = "SELECT heading_3, heading_2, short_desc, long_desc, button, img
        FROM special_offer_3_translation, languages
        WHERE special_offer_3_translation.languages_id = languages.id
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




// OfferMain (headings)  ----------- //

    public function getOfferMain($lang) {
        $query = "SELECT heading_3, heading_2
        FROM courses_heading_translation, languages
        WHERE courses_heading_translation.languages_id = languages.id
        AND languages.code = ?;";

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

        return new OfferMain($row['heading_3'], $row['heading_2']);
    }

// CommonDesc ----------- //

    public function getCommonDescAll($lang) {
        $itemArr = array();        

        $query = "SELECT c_d.id, c_d_t.common_desc
            FROM common_desc as c_d, common_desc_translation as c_d_t, languages
            WHERE c_d.id = c_d_t.common_desc_id
            AND c_d_t.languages_id = languages.id
            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new OfferCommonDesc($row['id'], $row['common_desc']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }

        return $itemArr;
    }

    public function getCommonDescById($lang, $common_desc_id) {
        $query = "SELECT c_d.id, c_d_t.common_desc
            FROM common_desc as c_d, common_desc_translation as c_d_t, languages
            WHERE c_d.id = ?
            AND c_d.id = c_d_t.common_desc_id
            AND c_d_t.languages_id = languages.id
            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $common_desc_id, $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new OfferCommonDesc($row['id'], $row['common_desc']);
    }



// Offer  ----------- //

    public function getOfferAll($lang) {
        $itemArr = array();        

        $query = "SELECT id, courses_id, category_id, sort_index, code FROM offer;";

        $result = $this->conn->query($query); // prepare statement

        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Offer($row['id'], $row['courses_id'], $row['category_id'], $row['sort_index'], $row['code']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }

        return $itemArr;
    }

    public function getOfferById($offer_id) {
        // get offer data
        $query = "SELECT id, courses_id, category_id, sort_index, code 
            FROM offer
            WHERE offer.id=?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('i', $offer_id); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data

        if (empty($row)) {        
            throw new NotFoundException();
        }
        return new Offer($row['id'], $row['courses_id'], $row['category_id'], $row['sort_index'], $row['code']);
    }

    public function getOfferByCategoryId($category_id) {
        $itemArr = array();

        $query = "SELECT id, courses_id, category_id, sort_index, code
            FROM offer
            WHERE offer.category_id=?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('i', $category_id); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Offer($row['id'], $row['courses_id'], $row['category_id'], $row['sort_index'], $row['code']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        // Sort array
        usort($itemArr, array('Konwersatorium\Domain\Offer', 'comparator'));

        return $itemArr;
    }


// OfferCourse (courses table | courses_translation table)  ----------- //

    public function getCoursesAll($lang) {
        $itemArr = array();        

        $query = "SELECT c.id, c.code, c.common_desc_id, c.img_thumbnail, c.movie, 
                c_t.course_name, c_t.heading_3, c_t.button, c_t.long_desc, c_t.short_desc, c_t.img
            FROM courses as c, courses_translation as c_t, languages
            WHERE c.id = c_t.courses_id
            AND c_t.languages_id = languages.id
            
            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new OfferCourse($row['id'], $row['code'], $row['common_desc_id'], $row['img_thumbnail'], $row['movie'],
            $row['course_name'], $row['heading_3'], $row['button'], $row['long_desc'], $row['short_desc'], $row['img']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        // TODO move sorting to controler 
        // Sort array
        usort($itemArr, array('Konwersatorium\Domain\OfferCourse', 'comparator'));

        return $itemArr;
    }

    public function getCourseById($lang, $course_id) {
        $query = "SELECT c.id, c.code, c.common_desc_id, c.img_thumbnail, c.movie, 
                c_t.course_name, c_t.heading_3, c_t.button, c_t.long_desc, c_t.short_desc, c_t.img
            FROM courses as c, courses_translation as c_t, languages
            WHERE c.id = ?

            AND c.id = c_t.courses_id
            AND c_t.languages_id = languages.id
            
            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $course_id, $lang); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new OfferCourse($row['id'], $row['code'], $row['common_desc_id'], $row['img_thumbnail'], $row['movie'],
                    $row['course_name'], $row['heading_3'], $row['button'], $row['long_desc'], $row['short_desc'], $row['img']);
    }

    public function updateCourseById($lang, $course_id) {
        // courses table
        $code = $_POST['code'];
        $common_desc_id = $_POST['common_desc_id'];
        $img_thumbnail = $_POST['img_thumbnail_original'];
        // check if there is new img_thumbnail
        if ($_FILES['img_thumbnail']['size'] !== 0 && $_FILES['img_thumbnail']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta-ikony/';            
            // set path to be stored in db
            $img_thumbnail = '/' . $img_folder . $_FILES['img_thumbnail']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img_thumbnail') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        $movie = $_POST['movie'];

        // courses_translation table
        $course_name = $_POST['course_name'];
        $heading_3 = $_POST['heading_3'];
        $short_desc = $_POST['short_desc'];
        $long_desc = $_POST['long_desc'];
        $img = $_POST['img_original'];
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        $button = $_POST['button'];

        // update main data
        // Step 2: Perform database query
        $sql = "UPDATE courses 
            SET
                code = '$code',
                common_desc_id = $common_desc_id,
                img_thumbnail = '$img_thumbnail',
                movie = '$movie'
            WHERE courses.id = $course_id;";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

        
        // Get main data
        // Step 2: Perform database query
        $sql = "UPDATE courses_translation 
        SET 
            course_name = '$course_name',
            heading_3 = '$heading_3',
            short_desc = '$short_desc',
            long_desc = '$long_desc',
            img = '$img',
            button = '$button'
        WHERE courses_translation.courses_id = $course_id
        
        AND courses_translation.languages_id = 
            (SELECT id FROM languages WHERE code = '$lang');";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }

    public function deleteCourseById($lang, $course_id) {
        $sql = "DELETE FROM courses WHERE id = $course_id;";

        if ($this->conn->query($sql) === TRUE) {
            // echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

    }

    public function createOfferCourse($lang) {
        // courses table
        $code = $_POST['code'];
        $common_desc_id = $_POST['common_desc_id'];
        $img_thumbnail = '';
        // check if there is new img_thumbnail
        if ($_FILES['img_thumbnail']['size'] !== 0 && $_FILES['img_thumbnail']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta-ikony/';            
            // set path to be stored in db
            $img_thumbnail = '/' . $img_folder . $_FILES['img_thumbnail']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img_thumbnail') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        $movie = $_POST['movie'];

        // courses_translation table
        $course_name = $_POST['course_name'];
        $heading_3 = $_POST['heading_3'];
        $short_desc = $_POST['short_desc'];
        $long_desc = $_POST['long_desc'];
        $img = '';
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }
        $button = $_POST['button'];

        $course_last_id;
        // Insert data to courses table
        // Step 2: Perform database query
        $sql = "INSERT INTO courses (`code`, `common_desc_id`, `img_thumbnail`, `movie`)
        VALUES ('$code', $common_desc_id, '$img_thumbnail', '$movie');";

        if ($this->conn->query($sql) === TRUE) {
            // get last id of inserted entity
            $course_last_id = $this->conn->insert_id;
        } else {
            throw new DbException($this->conn->error);
        }

        // TODO: check if  = $e_last_id is not -1
        // Insert translation data
        // Step 2: Perform database query
        // Use Google Translate to translate from polish to english
        $google_translate_service = new GoogleTranslate();

        $course_name_en = $google_translate_service->translate($course_name, 'en');
        // Use english translation to translate to vietnamies and chinies
        $course_name_vi = $google_translate_service->translate($course_name_en, 'vi');
        $course_name_zh = $google_translate_service->translate($course_name_en, 'zh');

        $heading_3_en = $google_translate_service->translate($heading_3, 'en');
        // Use english translation to translate to vietnamies and chinies
        $heading_3_vi = $google_translate_service->translate($heading_3_en, 'vi');
        $heading_3_zh = $google_translate_service->translate($heading_3_en, 'zh');

        $short_desc_en = $google_translate_service->translate($short_desc, 'en');
        // Use english translation to translate to vietnamies and chinies
        $short_desc_vi = $google_translate_service->translate($short_desc_en, 'vi');
        $short_desc_zh = $google_translate_service->translate($short_desc_en, 'zh');

        $long_desc_en = $google_translate_service->translate($long_desc, 'en');
        // Use english translation to translate to vietnamies and chinies
        $long_desc_vi = $google_translate_service->translate($long_desc_en, 'vi');
        $long_desc_zh = $google_translate_service->translate($long_desc_en, 'zh');

        $button_en = $google_translate_service->translate($button, 'en');
        // Use english translation to translate to vietnamies and chinies
        $button_vi = $google_translate_service->translate($button_en, 'vi');
        $button_zh = $google_translate_service->translate($button_en, 'zh');

        $sql = "INSERT INTO courses_translation (`languages_id`, `courses_id`, `course_name`, `heading_3`, `button`, `long_desc`, `short_desc`, `img`)
            VALUES 
            (1, $course_last_id, '$course_name', '$heading_3', '$button', '$long_desc', '$short_desc', '$img'),
            (2, $course_last_id, '$course_name_en', '$heading_3_en', '$button_en', '$long_desc_en', '$short_desc_en', '$img'),
            (3, $course_last_id, '$course_name_vi', '$heading_3_vi', '$button_vi', '$long_desc_vi', '$short_desc_vi', '$img'),
            (4, $course_last_id, '$course_name_zh', '$heading_3_zh', '$button_zh', '$long_desc_zh', '$short_desc_zh', '$img');";
        if ($this->conn->query($sql) === TRUE) {
            // get last id of inserted entity
            echo "Record added successfully";
        } else {
            throw new DbException($this->conn->error);
        }
       
    }


// OfferCategory (category | category_translation) ----------- //

    public function getOfferCategoryAll($lang) {
        $itemArr = array();

        $query = "SELECT c.id, c.code, c.common_desc_id, c.img, c_t.heading_3, c_t.paragraph, c_t.button, c_t.category, c_t.long_desc  
            FROM category as c, category_translation as c_t, languages 
            WHERE c_t.category_id = c.id
            AND c_t.languages_id = languages.id

            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {

            array_push($itemArr, new OfferCategory($row['id'], $row['code'], $row['common_desc_id'], $row['img'], 
                $row['heading_3'], $row['paragraph'], $row['button'], $row['category'], $row['long_desc']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    /*
    * Return offer category domain by category id
    */
    public function getOfferCategoryById($lang, $category_id) {
        $query = "SELECT c.id, c.code, c.common_desc_id, c.img, c_t.heading_3, c_t.paragraph, c_t.button, c_t.category, c_t.long_desc  
            FROM category as c, category_translation as c_t, languages 
            WHERE c.id = ?
            AND c_t.category_id = c.id
            AND c_t.languages_id = languages.id

            AND languages.code = ?;";

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

        return new OfferCategory($row['id'], $row['code'], $row['common_desc_id'], $row['img'], 
            $row['heading_3'], $row['paragraph'], $row['button'], $row['category'], $row['long_desc']);
    }

    public function updateCategoryById($lang, $category_id) {
        // category table
        $code = $_POST['code'];
        $common_desc_id = $_POST['common_desc_id'];
        $img = $_POST['img_original'];
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta-ikony/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }

        // categorys_translation table
        $heading_3 = $_POST['heading_3'];
        $paragraph = $_POST['paragraph'];
        $button = $_POST['button'];
        $category = $_POST['category'];
        $long_desc = $_POST['long_desc'];

        // update main data
        // Step 2: Perform database query
        $sql = "UPDATE category
            SET
                code = '$code',
                common_desc_id = $common_desc_id,
                img = '$img'
            WHERE category.id = $category_id;";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

        
        // Get main data
        // Step 2: Perform database query
        $sql = "UPDATE category_translation 
        SET 
            heading_3 = '$heading_3',
            paragraph = '$paragraph',
            button = '$button',
            category = '$category',
            long_desc = '$long_desc'
        WHERE category_translation.category_id = $category_id
        
        AND category_translation.languages_id = 
            (SELECT id FROM languages WHERE code = '$lang');";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }

    public function createOfferCategory($lang) {
        // category table
        $code = $_POST['code'];
        $common_desc_id = $_POST['common_desc_id'];
        $img = '';
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta-ikony/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];        

            // save file
            // TODO use general error or create specific one    
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }

        // categorys_translation table
        $heading_3 = $_POST['heading_3'];
        $paragraph = $_POST['paragraph'];
        $button = $_POST['button'];
        $category = $_POST['category'];
        $long_desc = $_POST['long_desc'];
        
        $category_last_id;
        // Insert data to category table
        // Step 2: Perform database query
        $sql = "INSERT INTO category (`code`, `common_desc_id`, `img`)
        VALUES ('$code', $common_desc_id, '$img');";

        if ($this->conn->query($sql) === TRUE) {
            // get last id of inserted entity
            $category_last_id = $this->conn->insert_id;
        } else {
            throw new DbException($this->conn->error);
        }

        // TODO: check if  = $e_last_id is not -1
        // Insert translation data
        // Step 2: Perform database query
        // Use Google Translate to translate from polish to english
        $google_translate_service = new GoogleTranslate();

        $heading_3_en = $google_translate_service->translate($heading_3, 'en');
        // Use english translation to translate to vietnamies and chinies
        $heading_3_vi = $google_translate_service->translate($heading_3_en, 'vi');
        $heading_3_zh = $google_translate_service->translate($heading_3_en, 'zh');

        $paragraph_en = $google_translate_service->translate($paragraph, 'en');
        // Use english translation to translate to vietnamies and chinies
        $paragraph_vi = $google_translate_service->translate($paragraph_en, 'vi');
        $paragraph_zh = $google_translate_service->translate($paragraph_en, 'zh');

        $button_en = $google_translate_service->translate($button, 'en');
        // Use english translation to translate to vietnamies and chinies
        $button_vi = $google_translate_service->translate($button_en, 'vi');
        $button_zh = $google_translate_service->translate($button_en, 'zh');

        $category_en = $google_translate_service->translate($category, 'en');
        // Use english translation to translate to vietnamies and chinies
        $category_vi = $google_translate_service->translate($category_en, 'vi');
        $category_zh = $google_translate_service->translate($category_en, 'zh');

        $long_desc_en = $google_translate_service->translate($long_desc, 'en');
        // Use english translation to translate to vietnamies and chinies
        $long_desc_vi = $google_translate_service->translate($long_desc_en, 'vi');
        $long_desc_zh = $google_translate_service->translate($long_desc_en, 'zh');


        $sql = "INSERT INTO category_translation (`languages_id`, `category_id`, `heading_3`, `paragraph`, `button`, `category`, `long_desc`)
            VALUES 
            (1, $category_last_id, '$heading_3', '$paragraph', '$button', '$category', '$long_desc'),
            (2, $category_last_id, '$heading_3_en', '$paragraph_en', '$button_en', '$category_en', '$long_desc_en'),
            (3, $category_last_id, '$heading_3_vi', '$paragraph_vi', '$button_vi', '$category_vi', '$long_desc_vi'),
            (4, $category_last_id, '$heading_3_zh', '$paragraph_zh', '$button_zh', '$category_zh', '$long_desc_zh');";
        if ($this->conn->query($sql) === TRUE) {
            // get last id of inserted entity
            echo "Record added successfully";
        } else {
            throw new DbException($this->conn->error);
        }
       
    }

    public function deleteCategoryById($lang, $category_id) {
        $sql = "DELETE FROM category WHERE id = $category_id;";

        if ($this->conn->query($sql) === TRUE) {
            // echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

    }


// Offer (offer)  ----------- //

    public function createOffer($long) {
        $course_id = $_POST['course_id'];
        $category_id = $_POST['category_id'];

        $course_code = $this->getCourseById('pl', $course_id)->getCode();
        $category_code = $this->getOfferCategoryById('pl', $category_id)->getCode();
        $code = $category_code . " | " . $course_code;

        // Insert main data
        // Step 2: Perform database query
        $sql = "INSERT INTO offer (`courses_id`, `category_id`, `code`)
        VALUES ($course_id, $category_id, '$code');";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            throw new DbException($this->conn->error);
        }

    }

    public function deleteOfferById($lang, $offer_id) {
        $sql = "DELETE FROM offer WHERE id = $offer_id;";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }

    }





// TODO move to ShopModel
// OfferBuy  ----------- //
    
    public function getOfferBuy($lang) {
        $query = "SELECT *  
        FROM shop_buy_translation, languages
        WHERE shop_buy_translation.languages_id = languages.id
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

        return new OfferBuy($row['heading_3_buy'], $row['heading_2_buy'], $row['heading_2_payment'], $row['heading_2_payment_1'], $row['heading_2_payment_2'],
            $row['heading_2_payment_3'], $row['info_main'], $row['info_buy'], $row['info_course'], $row['info_price'], $row['info_expiration'], $row['info_buy_contact'], $row['info_payment'], $row['button_confirm'],
            $row['button_pay'], $row['button_payment_policy'], $row['info_account'], $row['info_address'], $row['info_payment_gateway']);        
    }

    
    private function uploadFile($target_dir, $post_field_name) {
        if (($_FILES[$post_field_name]['name']!="")){
            // Where the file is going to be stored
            $target_file = $target_dir . basename($_FILES[$post_field_name]['name']); // The basename() function returns the filename from a path.
            
            return move_uploaded_file($_FILES[$post_field_name]['tmp_name'], $target_file);
        }
    }


}