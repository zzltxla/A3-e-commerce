<?php 

namespace App\Model;

class Size {
    private ?int $id = null;
    public ?int $name;

    public function __construct (int $name,
    ?int $id = null) {
        $this->id =  $id;
        $this->name = $name;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function getName(): ?int {
        return $this->name;
    }
}