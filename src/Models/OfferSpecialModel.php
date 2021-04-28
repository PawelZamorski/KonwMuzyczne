<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\OfferSpecial;
use Konwersatorium\Exceptions\NotFoundException;
use Konwersatorium\Exceptions\DbException;

use Konwersatorium\Services\GoogleTranslate;

class OfferSpecialModel extends AbstractModel {

    public function getOfferSpecialAll($lang) {
        $itemArr = array();

        $query = "SELECT o_s.id, o_s.languages_id, o_s.code, o_s.url, o_s.long_desc, o_s.heading_3, o_s.heading_2, o_s.img 
            FROM offer_special as o_s;";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new OfferSpecial($row['id'], $row['languages_id'], $row['code'], $row['url'], $row['long_desc'], 
                $row['heading_3'], $row['heading_2'], $row['img']));
        }

        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getOfferSpecialById($lang, $offer_special_id) {
        $query = "SELECT o_s.id, o_s.languages_id, o_s.code, o_s.url, o_s.long_desc, o_s.heading_3, o_s.heading_2, o_s.img 
            FROM offer_special as o_s, languages
            WHERE o_s.id = ?
            
            AND o_s.languages_id = languages.id
            AND languages.code = ?;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $offer_special_id, $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new OfferSpecial($row['id'], $row['languages_id'], $row['code'], $row['url'], $row['long_desc'], 
            $row['heading_3'], $row['heading_2'], $row['img']);
    }

    function updateOfferSpecialById($lang, $offer_special_id) {
        $code = $_POST['code'];
        $heading_3 = $_POST['heading_3'];
        $heading_2 = $_POST['heading_2'];
        $long_desc = $_POST['long_desc'];
        $img = $_POST['img_original'];
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta-specjalne/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];

            // save file
            // TODO use general error or create specific one
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }

        // Update main data
        // Step 2: Perform database query
        $sql = "UPDATE offer_special
            SET
                code = '$code',
                long_desc = '$long_desc',
                heading_3 = '$heading_3',
                heading_2 = '$heading_2',
                img = '$img'
            WHERE id = $offer_special_id;";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }

    function createOfferSpecial($lang) {
        $languages_id = $_POST['languages_id'];
        $code = $_POST['code'];
        $url = 0; // temp url. Update 'url' after inserting offer. Url is based on id 
        $long_desc = $_POST['long_desc'];
        $heading_3 = $_POST['heading_3'];
        $heading_2 = $_POST['heading_2'];
        $img = '';
        // check if there is new img
        if ($_FILES['img']['size'] !== 0 && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // TODO: delete old file
            // image path
            $img_folder = 'images/oferta-specjalne/';            
            // set path to be stored in db
            $img = '/' . $img_folder . $_FILES['img']['name'];

            // save file
            // TODO use general error or create specific one
            if ($this->uploadFile($img_folder, 'img') === false) {
                throw new NotFoundException('File not uploaded');
            }
        }

        // Insert main data
        // Step 2: Perform database query
        $sql = "INSERT INTO offer_special (`languages_id`, `code`, `url`, `long_desc`, `heading_3`, `heading_2`, `img`)
            VALUES ($languages_id, '$code', '$url', '$long_desc', '$heading_3', '$heading_2', '$img');";

        if ($this->conn->query($sql) === TRUE) {
            // Get last id
            $offer_special_last_id = $this->conn->insert_id;
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }


        // Create URL: offer/special/:lang/:id
        // get lang from table
        $query = "SELECT code 
            FROM languages
            WHERE id = $languages_id;";

        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('i', $languages_id); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }
        $languages_code = $row['code'];

        $url = 'https://www.konwersatoriummuzyczne.pl/offer/special/'. $languages_code . '/' .  $offer_special_last_id;
        $sql = "UPDATE offer_special
            SET
                url = '$url'
            WHERE id = $offer_special_last_id;";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }

    function deleteOfferSpecialById($lang, $offer_special_id) {
        // Update main data
        // Step 2: Perform database query
        $sql = "DELETE FROM offer_special WHERE id = $offer_special_id;";

        if ($this->conn->query($sql) === TRUE) {
//            echo "Record updated successfully";
        } else {
            throw new DbException($this->conn->error);
        }
    }


    private function uploadFile($target_dir, $post_field_name) {
        if (($_FILES[$post_field_name]['name']!="")){
            // Where the file is going to be stored
            $target_file = $target_dir . basename($_FILES[$post_field_name]['name']); // The basename() function returns the filename from a path.
            
            return move_uploaded_file($_FILES[$post_field_name]['tmp_name'], $target_file);
        }
    }

}