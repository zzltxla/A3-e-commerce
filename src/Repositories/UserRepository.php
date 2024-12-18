<?php 

namespace App\Repositories;

use App\Model\User;
use PDO;
use App\Database\Database;

class UserRepository {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAll() {
        $fetchData = $this->db->read('user');
        $users = [];
        foreach ($fetchData as $row) {
            $users[] = new User(
                firstname: $row['firstname'],
                lastname: $row['lastname'],
                email: $row['email'],
                phone: $row['phone'],
                id: $row['id']
            );
        }
        return $users;
    }
}