<?php

try {

    new PDO('', '', '');

    $bool = false;
    $bool->method();

    echo '通常処理が最後まで実行されました。<br>';
} catch (PDOException $e) {

    echo 'PDOException<br>';
    echo '例外処理が実行されました。<br>';
    echo $e->getMessage() . '<br>';
} catch (Error $e) {
    // Errorを$eに格納し、e->getMessage()でエラーメッセージを取得する
    echo '例外処理が実行されました。<br>';
    echo $e->getMessage() . '<br>';
} finally {

    echo '終了処理が実行されました。<br>';
}