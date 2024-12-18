<?php 

namespace App\Model;

class Product {
    public ?int $id;
    public ?string $name;
    public ?string $image;
    public ?float $price;
    public ?string $description;
    public ?int $categoryId;
    public ?int $brandId;
    
    public function __construct
    ( 
        ?int $id, 
        ?string $name, 
        ?string $image, 
        ?float $price, 
        ?string $description, 
        ?int $categoryId, 
        ?int $brandId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->brandId = $brandId;
    }

    public function getId():?int {
        return $this->id;
    }

    public function setName(string $name) {
        $this->name = $name;
    }
    public function getName():string{
        return $this->name;
    }

    public function setImage(string $image) {
        $this->name = $image;
    }
    public function getImage():string{
        return $this->image;
    }

    public function setPrice(float $price) {
        $this->price = $price;
    }
    public function getPrice():float {
        return $this->price;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }
    public function getDescription():string { 
        return $this->description;
    }

    public function setCategoryId (int $categoryId) {
        $this->categoryId = $categoryId;
    }
    public function getCategoryId ():?int {
        return $this->categoryId;
    }

    public function setBrandId (int $brandId) {
        $this->brandId = $brandId;
    }
    public function getBrandId ():?int {
        return $this->brandId;
    }
}