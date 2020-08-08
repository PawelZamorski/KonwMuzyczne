<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\ProgressMain;
use Konwersatorium\Exception\NotFoundException;


class ProgressMainModel extends AbstractModel {

    public function getAllLang($lang) {
        $query = "SELECT heading_3, heading_2, button, short_desc, long_desc
        FROM main_progress_heading_translation, languages as l
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

        return new ProgressMain($row['heading_3'], $row['heading_2'], $row['button'], $row['short_desc'], $row['long_desc']);
    }

}
