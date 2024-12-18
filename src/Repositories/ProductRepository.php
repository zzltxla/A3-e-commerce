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

    public function findAll():array|Product
    {
        $fetchData = $this->db->read('product');
        $products = [];

        foreach ($fetchData as $row) {
            $products[] = new Product(
            name: $row['name'],
            image: $row['image'],
            price: (float) $row['price'],
            description: $row['description'],
            categoryId: (int) $row['categoryId'],
            brandId: (int) $row['brandId'],
            id: $row['id']
            );
        }
        return $products;
    }
    public function findById(?int $id):Product|null {
        if ($id === null) {
            return null; //handle null values
        }
        $fetchData = $this->db->read('product ', "id =" . intval($id));

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
}

