<?php 

namespace App\Repositories;

use App\Model\Payment;
use PDO;
use App\Database\Database;

class PaymentRepository {
    private $db;

    public function __construct () {
        $this->db = new Database;
    }

    public function findAll(): array {
        $fetchData = $this->db->read('payment');
        $payments = [];

        foreach ($fetchData as $row) {
            $payments[] = new Payment(
                method: $row['method'],
                status: $row['status'],
                datetime: $row['datetime'],
                id: $row['id']
            );
        }
        return $payments;
    }
}