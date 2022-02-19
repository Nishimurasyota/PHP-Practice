<?php

/**
 * 理解度チェック（クラス）
 * 
 * ファイル書き込みを行うためのクラスを定義してみましょう。
 * 
 * ヒント）PHP_EOL: 改行するための特殊な定数です。
 */


class MyFileWriter
{
    private $filename;
    private $content = '';
    public const APPEND = FILE_APPEND;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    function append($content)
    {
        $this->content .= $content;
        return $this;
        // return $thisにすることでチェーンメソッドで記述することができる
    }

    function newline()
    {
        return $this->append(PHP_EOL);
        // appendに対してPHP_EOLを引数にして渡している
    }

    function commit($flag = null)
    {
        file_put_contents($this->filename, $this->content, $flag);
        $this->content = '';
        return $this;
    }
}

$content = 'Hello, Bob.'; // append
$content .= PHP_EOL; // newline
$content .= 'Bye, '; // append
$content .= 'Bob.'; // append
$content .= PHP_EOL; // newline

// commit
file_put_contents('sample.txt', $content);
$content = '';

$content = 'Good night, Bob.'; // append

// commit
file_put_contents('sample.txt', $content, FILE_APPEND);
$content = '';


$file = new MyFileWriter('sample.txt');
$file->append('Hello, Bob.')
    ->newline()
    ->append('Bye, ')
    ->append('Bob.')
    ->newline()
    ->commit()
    ->append('Good night, Bob.')
    ->commit(MyFileWriter::APPEND);