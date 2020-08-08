<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Info;
use Konwersatorium\Exception\NotFoundException;

class InfoModel extends AbstractModel {

    public function getAllLang($lang) {
        $query = "SELECT mait.heading_3, mait.heading_2, mait.short_desc, mait.long_desc
        FROM main_about_info_translation as mait, languages as l
        WHERE mait.languages_id = l.id
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

        return new Info($row['heading_3'], $row['heading_2'], $row['short_desc'], $row['long_desc']);
    }

}
