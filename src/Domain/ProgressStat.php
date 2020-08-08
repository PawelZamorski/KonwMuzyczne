<?php

namespace Konwersatorium\Domain;

class ProgressStat {
    private $short_desc;
    private $percent;

    public function __construct($short_desc, $percent) {
        $this->short_desc = $short_desc;
        $this->percent = $percent;
    }

    public function getShortDesc() {
        return $this->short_desc;
    }

    public function getPercent() {
        return $this->percent;
    }

}
