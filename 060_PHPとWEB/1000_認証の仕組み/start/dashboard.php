<?php

session_start();

if (
    isset($_POST["username"])
    && isset($_POST["pwd"])
    && $_POST["username"] === "test"
    && $_POST["pwd"] === "pwd"
    // issetでusername,pwdの値がある確認して、===で値が等価か見ている
) {
    // ログイン中OK
    $_SESSION["user"] = [
        "name" => $_POST["username"],
        "pwd" => $_POST["pwd"],
    ];
    // if分がtrueの場合は$_SESSION["user"]にそれぞれの値が設定される
}

if (!empty($_SESSION["user"])) {
    //!empty($_SESSION["user"])で$_SESSION["user"]に値があるか確認
    echo "ログイン中";
} else {
    echo "ログイン失敗です";
}