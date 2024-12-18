<?php

namespace App\Repositories;

use App\Model\Product;
use PDO;
use App\Database\Database;

class ProductRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAll()
    {
        $fetchData = $this->db->read('product');

        $row = $fetchData[0];

        return new Product(
            name: $row['name'],
            image: $row['image'],
            price: (float) $row['price'],
            description: $row['description'],
            categoryId: (int) $row['categoryId'],
            brandId: (int) $row['brandId'],
            id: $row['id']
        );
        }

    public function findById(?int $id) {
        if ($id === null) {
            return []; //handle null values
        }

        $fetchData = $this->db->read('product', "id = " . intval($id));
        $product = [];
        foreach ($fetchData as $row) {
            $product[] = new Product(
                name: $row['name'],
                image: $row['image'],
                price: (float) $row['price'],
                description: $row['description'],
                categoryId: (int) $row['categoryId'],
                brandId: (int) $row['brandId'],
                id: $row['id']
            );
        }
        return $product;
    }
}
