<?php
class Car {
    private $brand;
    private $year;

    public function __construct($brand, $year) {
        $this->brand = $brand;
        $this->year = $year;
    }

    public function getInfo() {
        return "Brand: " . $this->brand . ", Year: " . $this->year;
    }
}

$car1 = new Car("Toyota", 2020);
echo $car1->getInfo();
