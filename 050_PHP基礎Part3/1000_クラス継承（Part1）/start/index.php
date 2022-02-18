<?php

use Japanese as GlobalJapanese;
use Person as GlobalPerson;

/**
 * クラス継承
 */
class Person
{
    protected $name;
    // protectedは自クラスか継承したクラスからの参照を許可する
    public $age;
    public const WHERE = 'Earth';

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
}

class Japanese extends Person
//class Japanese extends Personとすることで Personクラスを継承したJapaneseクラスを定義している
{
    function hello()
    {
        echo 'こんにちは、 ' . $this->name;
        return $this;
    }
    //helloメソッドを変更・上書きして作成している、継承元にあって、継承先にないメソッドやプロパティは引き継ぐ
}

$bob = new Japanese('翔太', 18);
$bob->hello();
// $bob->hello()->bye();

// $tim = new Person('Tim', 32);
// $tim->hello();