<?php

namespace Konwersatorium\Domain;

class Authentication {
    private $user_name;
    private $user_password;

    public function __construct($user_name, $user_password) {
        $this->user_name = $user_name;
        $this->user_password = $user_password;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function getUserPassword() {
        return $this->user_password;
    }

}
