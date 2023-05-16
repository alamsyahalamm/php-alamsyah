<?php
class Person {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getInfo() {
        return "Name: " . $this->name . ", Age: " . $this->age;
    }
}

$person1 = new Person("Sarah", 25);
echo $person1->getInfo();