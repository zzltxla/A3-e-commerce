<?php 

namespace App\Model;

use App\Database\Database;

class CategoryManager {
    private $category_manager;

    public function __construct(CategoryManager $category_manager) {
        $this->category_manager = $category_manager;
    }
}