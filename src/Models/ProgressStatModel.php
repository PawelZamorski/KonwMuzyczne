<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\ProgressStat;
use Konwersatorium\Exception\NotFoundException;


class ProgressStatModel extends AbstractModel {

    /*
    * Returns array of counter elements
    */
    public function getAllLang($lang) {
        $itemArr = array();

        $query = "SELECT short_desc, percent
        FROM main_progress_translation, languages as l
        WHERE languages_id = l.id
        AND l.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new ProgressStat($row['short_desc'], $row['percent']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

}
