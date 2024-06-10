<?php
// using include_once instead of include prevents fatal error for duplicating base class declartions
include_once "animal.php";

// Derived class Lion
class Lion extends Animal
{
public function __construct ($name)             // constructor
{
    parent::__construct($name,"Zebra's meat");   // calling base constructor
}

public function speak()                         // implementation of base class abstract function speak()
{
    echo "Roar!";
}

public function is_domesticated()               // implementation of base class abstract function is_domesticated()
{
    return false;
}

}

?>