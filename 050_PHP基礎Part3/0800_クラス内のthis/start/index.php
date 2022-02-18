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
        echo 'hello, ' . $this->name . ', ';
        return $this;
    }

    function bye()
    {
        echo 'bye, ' . $this->name;
        return $this;
    }
}

$bob = new Person('Bob', 18);
//$bob->hello();
//returnで$thisが返却されるのでbobオブジェクトが返却されるのと同じになる
//ということは【$bob->$bob】ということになるので
$bob->hello()->bye();
//さらにメソッドを繋げることも可能、これをチェーンメソッドという
//この場合の出力結果は【hello, Bob, bye, Bob】