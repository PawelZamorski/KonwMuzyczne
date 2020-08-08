<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Facts;
use Konwersatorium\Exception\NotFoundException;


class FactsModel extends AbstractModel {

    /*
    * Returns array of counter elements
    */
    public function getAllLang($lang) {
        $itemArr = array();

        $query = "SELECT mf.icon, mft.fact
        FROM main_facts as mf, main_facts_translation as mft, languages as l
        WHERE mft.main_facts_id = mf.id
        AND mft.languages_id = l.id
        AND l.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Facts($row['icon'], $row['fact']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

}
