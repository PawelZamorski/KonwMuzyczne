<?php

namespace Konwersatorium\Models;

abstract class AbstractModel {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

}
