<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\ContactMain;
use Konwersatorium\Exceptions\NotFoundException;

class ContactModel extends AbstractModel {

    public function getContactMain($lang) {
        $query = "SELECT heading_3, heading_2, address, branch_address, phone
        FROM main_contact_translation, languages as l
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

        return new ContactMain($row['heading_3'], $row['heading_2'], $row['address'], $row['branch_address'], $row['phone']);
    }

}