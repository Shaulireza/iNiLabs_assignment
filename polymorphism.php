<?php
class Animal {
    public function makeSound() {
        return "Some generic animal sound";
    }
}
class Monkey extends Animal {
    public function makeSound() {
        return "whoop";
    }
}
class Cat extends Animal {
    public function makeSound() {
        return "Meow";
    }
}
class Horse extends Animal {
    public function makeSound() {
        return " neigh";
    }
}

function AnimalSound(Animal $animal) {
    echo $animal->makeSound();
}
$monkey = new Monkey();
$cat = new Cat();
$horse = new Horse();


AnimalSound($monkey); 
echo "<br><br>";
AnimalSound($cat);
echo "<br><br>"; 
AnimalSound($horse);  

?>
