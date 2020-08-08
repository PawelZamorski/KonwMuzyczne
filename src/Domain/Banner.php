<?php

namespace Konwersatorium\Domain;

class Banner {
    private $name;
    private $long_desc;
    private $button;
    private $img;

    public function __construct($name, $long_desc, $button, $img) {
        $this->name = $name;
        $this->long_desc = $long_desc;
        $this->button = $button;
        $this->img = $img;
    }

    public function getName() {
        return $this->name;
    }

    public function getLongDesc() {
        return $this->long_desc;
    }

    public function getButton() {
        return $this->button;
    }

    public function getImg() {
        return $this->img;
    }

}
