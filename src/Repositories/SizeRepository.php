<?php 

namespace App\Repositories;

use App\Model\Size;
use PDO;
use App\Database\Database;

class SizeRepository {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAll() 
    {
        $fetchData = $this->db->read('size');
        $sizes = [];

        foreach ($fetchData as $row) {
            $sizes[] = new Size(
                name: $row['size'],
                id: $row['id']
            );
        }
        return $sizes;
    }
}