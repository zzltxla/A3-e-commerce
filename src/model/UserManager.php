<?php

namespace App\Model;

use App\Database\Database;

class UserManager {
    private $user_manager;

    public function __construct(UserManager $user_manager) {
        $this->user_manager = $user_manager;
    }
}