<?php

namespace Konwersatorium\Models;

use Konwersatorium\Domain\Authentication;
use Konwersatorium\Exceptions\NotFoundException;

class AuthenticationModel extends AbstractModel {

    public function getUserByName($user_name) {
        $query = "SELECT * 
        FROM admin_users
        WHERE user_name = ?;";

        // TODO: should try catch block be used ???
        $stmt = $this->conn->prepare($query); // prepare statement
        $stmt->bind_param('s', $user_name); // bind params to the statement
        $stmt->execute(); // execute query
        // Get the result
        $result = $stmt->get_result();
        // Fetch first row
        $row = $result->fetch_assoc();
        // Check if there are any data
        if (empty($row)) {
            throw new NotFoundException();
        }

        return new Authentication($row['user_name'], $row['user_password']);
    }

}
