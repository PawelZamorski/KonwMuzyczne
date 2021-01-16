<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Form;
use Konwersatorium\Exceptions\NotFoundException;

class FormModel extends AbstractModel {
    
    public function getAllFields($lang) {
        $query = "SELECT ft.name, ft.surname, ft.street, ft.town, ft.postcode, ft.country, ft.email, ft.message, ft.currency_label, ft.privacy_policy,
        ft.learning_policy, ft.button 
        FROM form_translation as ft, languages
        WHERE ft.languages_id = languages.id
        AND languages.code = ?;";

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

        return new Form($row['name'], $row['surname'], $row['street'], $row['town'], $row['postcode'],
            $row['country'], $row['email'], $row['message'], $row['currency_label'], $row['privacy_policy'], $row['learning_policy'], $row['button']);        
    }

}