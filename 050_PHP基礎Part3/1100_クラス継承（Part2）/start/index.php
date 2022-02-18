<?php

/**
 * クラス継承
 */
class Person
{
    private $name;
    public $age;
    public const WHERE = 'Earth';

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    final function hello()
    {
        echo 'hello, ' . $this->name;
        return $this;
    }

    static function bye()
    {
        echo 'bye';
    }
}

// $bob = new Person('Bob', 18);
// $bob->hello();

// メソッドやプロパティの前に[final]をつけると継承先で変更ができない
// 継承先で定義するメソッドやプロパティは前に[abstract]を使用する、abstractがあるクラスはクラス名の前にも[abstract]をつける必要がある
// [abstract]があるクラスはそのクラス単体では使用できない、継承して使用する必要がある
// [abstract]があることでそのメソッドなどが必ず定義されることが約束される



class Japanese extends Person
{

    public static $WHERE = "日本";

    // function hello()
    // {
    //     echo 'こんにちは、 ' . $this->name;
    //     return $this;
    // }
    function jusho()
    {
        echo '住所は' . parent::WHERE . 'です';
        // parentは継承元のメソッドやプロパティを参照するときに使用する
    }
}

$bob = new Japanese('翔太', 18);
$bob->hello();
$bob->jusho();

// selfとstatisの違い
// 継承先で使用する分には変わらないが、継承元で使用すると挙動が変わる
// 継承元でselfを使用すると継承元で該当するプロパティなどを探すが
// staticの場合は継承先まで探しにいく