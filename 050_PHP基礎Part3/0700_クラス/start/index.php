<?php
class Person
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function hello()
    {
        echo 'hello, ' . $this->name;
    }
}

$bob = new Person("Bob", 18);
//echo $bob->name;
$bob->hello();

// $bob->でbobのメソッドやプロパティを呼び出している