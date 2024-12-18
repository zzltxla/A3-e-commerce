<?php

namespace App\Repositories;

use App\Model\Category;
use PDO;
use App\Database\Database;

class CategoryRepository {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAll() {
        $fetchData = $this->db->read('category');
        $categories = [];

        foreach ($fetchData as $row ) {
            $categories[] = new Category(
                name: $row['name'],
                id: $row['id'],
            );
        }
        return $categories;
    }
}