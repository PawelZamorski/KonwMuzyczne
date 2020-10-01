<?php

namespace Konwersatorium\Domain;

class OfferType {
    private $type_id;
    private $type;

    public function __construct($type_id, $type) {
        $this->type_id = $type_id;
        $this->type = $type;
    }

    public function getTypeId() {
        return $this->type_id;
    }

    public function getType() {
        return $this->type;
    }

}
