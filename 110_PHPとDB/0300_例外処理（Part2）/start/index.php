<?php

/**
 * 例外処理
 */

function throwException()
{
    try {

        $bool = false;
        $bool->method();

        new PDO('', '', '');

        echo '通常処理が最後まで実行されました。<br>';
    } catch (PDOException $e) {

        echo 'PDOException<br>';
        echo '例外処理が実行されました。<br>';
        echo $e->getMessage() . '<br>';
        // エラーの内容を確認する時にgetMessage()を活用する
    }
}

try {

    throwException();

    echo '通常処理が最後まで実行されました。<br>';
} catch (Error $e) {

    echo '例外処理が実行されました。<br>';
    echo $e->getMessage() . '<br>';
} finally {

    echo '終了処理が実行されました。<br>';
}