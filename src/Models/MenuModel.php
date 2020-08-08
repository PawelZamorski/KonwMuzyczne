<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Menu;
use Konwersatorium\Exceptions\NotFoundException;

class MenuModel extends AbstractModel {

    /*
    * Returns array of menu elements
    */
    public function getAllLang($lang) {

        $itemArr = array();

        $query = "SELECT menu.sort_index, menu.code, menu_translation.nav_link
            FROM menu, menu_translation, languages
            WHERE menu_translation.menu_id = menu.id

            AND menu_translation.languages_id = languages.id
            AND languages.code = ?;";

        // TODO: should be used try catch block ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $lang); // bind params to the statement. First param: data type, ie 'i' stands for integer, 's' for string
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            array_push($itemArr, new Menu($row['sort_index'], $row['code'], $row['nav_link']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }
}