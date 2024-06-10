<?php

abstract class Animal                          // Base Class
{
    private $name="";                          // private members name and food
    private $food="";

    // public methods/functions
    public function __construct($name, $food) // constructor receiving 2 args to set private variables
    {
        $this->name=$name;
        $this->food=$food;
    }

    public function get_name()          // name getter
    {
        return $this->name;
    }

    public function get_food()          // food getter
    {
        return $this->food;
    }

    abstract public function speak();           // abastract functions must be implemented on derived classes

    abstract public function is_domesticated();
}

?>