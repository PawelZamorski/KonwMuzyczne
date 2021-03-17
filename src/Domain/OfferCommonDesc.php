<?php

namespace Konwersatorium\Domain;

class OfferCommonDesc {
    // common_desc table
    private $id;
    // common_desc_translation
    private $common_desc;

    public function __construct($id, $common_desc) {
        $this->id = $id;
        $this->common_desc = $common_desc;
    }

    public function getId() {
        return $this->id;
    }

    public function getCommonDesc() {
        return $this->common_desc;
    }

}
