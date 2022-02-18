<?php

/**
 * クラス内のthis
 */
class Person
{
    private $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function hello()
    {
        echo 'hello, ' . $this->name;
        return $this;
    }

    static function bye()
    {
        echo 'bye';
    }
    //    static 静的メソッドではthisを使用できない
    //    staticはクラスに登録されるため、thisの所在がわからない
    //    クラス内でstaticメソッドを使用する場合は[static::メソッド名, self::メソッド名]とする
}

$bob = new Person('Bob', 18);
Person::bye();
    //    staticメソッドを呼び出すときはクラス名::で呼び出すことが多い

//$bob->hello()->bye();

// $tim = new Person('Tim', 32);
// $tim->hello();