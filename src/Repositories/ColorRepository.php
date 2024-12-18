<?php

namespace App\Repositories;

use App\Model\Color;
use PDO;
use App\Database\Database;

class ColorRepository {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAll(): array {
        $fetchData = $this->db->read('color');
        $colors = [];
        foreach ($fetchData as $row) {
            $colors[] = new Color(
                name: $row['name'],
                id: $row['id']
            );
        }
        return $colors;
    }
}