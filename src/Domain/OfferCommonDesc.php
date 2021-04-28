<?php

namespace Konwersatorium\Domain;

class OfferCommonDesc {
    // common_desc table
    private $id;
    private $code;
    // common_desc_translation
    private $common_desc;

    public function __construct($id, $code, $common_desc) {
        $this->id = $id;
        $this->code = $code;
        $this->common_desc = $common_desc;
    }

    public function getId() {
        return $this->id;
    }

    public function getCode() {
        return $this->code;
    }    

    public function getCommonDesc() {
        return $this->common_desc;
    }

}
