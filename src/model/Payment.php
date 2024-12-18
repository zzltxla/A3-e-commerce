<?php 

namespace App\Model;

use DateTime;

class Payment {
    private ?int $id = null;
    public ?string $method;
    public ?string $status;
    public $datetime;

    public function __construct (string $status, string $method, $datetime, ?int $id) {
        $this->id = $id;
        $this->method = $method;
        $this->status = $status;
        $this->datetime = $datetime;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setMethod ($method) {
        $this->method = $method;
    }
    public function getMethod ():?string {
        return $this->method;
    }

    public function setStatus ($status) {
        $this->status = $status;
    }
    public function getStatus ():?string {
        return $this->status;
    }

    public function setDatetime ($datetime) {
        $this->datetime = $datetime;
    }
    public function getDatetime () {
        return $this->datetime;
    }
}