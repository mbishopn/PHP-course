<?php

class Person                          // Base Class
{
    private $firstName="Manuel";
    private $lastName="Bishop";
    
    public function get_first()
    {
        return $this->firstName;
    }
    
    public function get_last()
    {
        return $this->lastName;
    }
    
    public function get_full()
    {
       
        return $this->get_first() . " " . $this->get_last();
        //return $this->firstName . " " . $this->lastName;
    }
}

?>