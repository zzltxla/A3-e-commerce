<?php

namespace App\Model;

use App\Model\Database;

class SizeManager {
    private $size_manager;

    public function __construct(SizeManager $size_manager) {
        $this->size_manager = $size_manager;
    }
}