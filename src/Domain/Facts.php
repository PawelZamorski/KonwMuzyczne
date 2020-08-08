<?php

namespace Konwersatorium\Domain;

class Facts {
    private $icon;
    private $fact;

    public function __construct($icon, $fact) {
        $this->icon = $icon;
        $this->fact = $fact;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function getFact() {
        return $this->fact;
    }

}
