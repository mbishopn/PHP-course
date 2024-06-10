<?php
// using include_once instead of include prevents fatal error for duplicating base class declartions
include_once "animal.php";

// derived class Dog
class Dog extends Animal
{
public function __construct ($name)     // constructor
{
    parent::__construct($name, "Meat"); // calling base constructor
}

public function speak()                 // implementation of base class abstract function speak()
{
    echo "Woof!";
}

public function is_domesticated()       // implementation of base class abstract function is_domesticated()
{
    return true;
}

}

?>