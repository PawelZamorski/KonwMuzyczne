<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Banner;
use Konwersatorium\Exception\NotFoundException;

class BannerModel extends AbstractModel {

    public function getAllLang($lang) {
        $query = "SELECT mbt.name, mbt.long_desc, mbt.button, mb.img
        FROM main_banner as mb, main_banner_translation as mbt, languages as l
        WHERE mbt.main_banner_id = mb.id
        AND mbt.languages_id = l.id
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

        return new Banner($row['name'], $row['long_desc'], $row['button'], $row['img']);
    }

}
