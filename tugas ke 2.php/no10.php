<?php
class Animal {
    private $name;
    private $sound;

    public function __construct($name, $sound) {
        $this->name = $name;
        $this->sound = $sound;
    }

    public function makeSound() {
        echo "" . $this->name . " makes the sound: " . $this->sound;
    }
}

$animal1 = new Animal("Cat", "Meow");
$animal1->makeSound();