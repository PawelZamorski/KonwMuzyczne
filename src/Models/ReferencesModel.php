<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\References;
use Konwersatorium\Domain\ReferencesMain;
use Konwersatorium\Exceptions\NotFoundException;

class ReferencesModel extends AbstractModel {

    public function getAll($lang) {
        $itemArr = array();

        $query = "SELECT rt.references_category_id, rt.heading_3, rt.heading_2, rt.short_desc, rt.long_desc, rt.button
        FROM references_category as r, references_category_translation as rt, languages
        WHERE rt.references_category_id = r.id
        
        AND rt.languages_id = languages.id
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new References($row['references_category_id'], $row['heading_3'], $row['heading_2'], $row['short_desc'], $row['long_desc'], $row['button']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getReferencesMain($lang) {
        $query = "SELECT *
        FROM main_references_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = ?;";

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

        return new ReferencesMain($row['heading_3'], $row['heading_2'], $row['button_1'], $row['button_2'], $row['button_3'], $row['partners']);
    }

    public function getRefByCategoryId($lang, $category_id) {
        $query = "SELECT rt.references_category_id, rt.heading_3, rt.heading_2, rt.short_desc, rt.long_desc, rt.button
        FROM references_category_translation as rt, languages
        WHERE rt.references_category_id = ?
        
        AND rt.languages_id = languages.id
        AND languages.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('is', $category_id, $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();

        // Fetch associative array
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }
 
        return new References($row['references_category_id'], $row['heading_3'], $row['heading_2'], $row['short_desc'], $row['long_desc'], $row['button']);
    }
}