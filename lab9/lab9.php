
<?php
// include classes files
include "animal.php";  // I don't really need to include this, because is already included in derived classes files
include "dog.php";
include "lion.php";
include "person.php";


$manu= new Person();
echo $manu->get_first() . "<br>";
echo $manu->get_last() . "<br>";
echo $manu->get_full() . "<br>";

// instantiating a Dog class object
$clifford= new Dog("Clifford");


// instantiating a Lion class object
$lion= new Lion("Alex the lion");


// array to hold objects
$animals=Array($clifford, $lion);

foreach ($animals as $animal)
{
    echo "<br><br>";
    $animal->speak();
    echo "<p>{$animal->get_name()} is hungry! Better feed it with {$animal->get_food()}!</p>";
    echo $animal->is_domesticated()?"<p>Good thing it's domesticaded</p>":"<p>Better run!!</p>";
}

?>