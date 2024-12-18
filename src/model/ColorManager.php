<?php

namespace app\Model;

use App\Model\Database;

class ColorManager {
    private $color_manager;

    public function __construct(ColorManager $color_manager) {
        $this->color_manager = $color_manager;
    }
}