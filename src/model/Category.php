<?php 

namespace App\Model;

class Category {
    private ?int $id = null;
    public ?string $name;
    
    public function __construct(
        string $name,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setName($name ) {
        $this->name = $name;
    }
    public function getName(): ?string {
        return $this->name;
    }
}