<?php 

namespace App\Model;

use App\Model\Database;

class ProductManager {
    private $product_manager;
    public function __construct(ProductManager $product_manager) {
        $this->product_manager = $product_manager;
        
    }
}