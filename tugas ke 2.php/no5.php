<?php

class Student {
    private $name;
    private $age;

    public function __construct($name = "", $age = 0) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

?>
<?php

$student1 = new Student('John', 20);
echo $student1->getName();
echo "<br />";
echo $student1->getAge();

?>