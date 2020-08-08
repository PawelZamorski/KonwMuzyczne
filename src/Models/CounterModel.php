<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Counter;
use Konwersatorium\Exception\NotFoundException;


class CounterModel extends AbstractModel {

    /*
    * Returns array of counter elements
    */
    public function getAllLang($lang) {
        $itemArr = array();

        $query = "SELECT mct.heading_3, mc.counter, mct.short_desc
        FROM main_counter as mc, main_counter_translation as mct, languages as l
        WHERE mct.languages_id = l.id
        AND mct.main_counter_id = mc.id
        AND l.code = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Counter($row['heading_3'], $row['counter'], $row['short_desc']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

}
