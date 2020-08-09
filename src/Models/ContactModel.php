<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\ContactDetail;
use Konwersatorium\Domain\ContactMain;
use Konwersatorium\Exceptions\NotFoundException;

class ContactModel extends AbstractModel {

    public function getContactDetails($lang) {
        $itemArr = array();

        $query = "SELECT detail
        FROM main_contact_details_translation, languages as l
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
            array_push($itemArr, new ContactDetail($row['detail']));
        }
        // Check if there are any data
        if (empty($itemArr)) {
            throw new NotFoundException();
        }
        return $itemArr;
    }

    public function getContactMain($lang) {
        $query = "SELECT heading_3, heading_2, email_name, email_email, email_message, button
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

        return new ContactMain($row['heading_3'], $row['heading_2'], $row['email_name'], $row['email_email'], $row['email_message'], $row['button']);
    }

}