<?php

namespace controller\login;

use  db\UserQuery;

function get()
{
    require_once SOURCE_BASE . 'views/login.php';
}

function login($id, $pwd)
{

    $is_success = false;

    $user = UserQuery::fetchById("$id");

    if (!empty($user) && $user->del_flg !== 1) {

        $result = password_verify($pwd, $user->pwd);
        if ($result) {
            $is_success = true;
            $_SESSION["user"] = $user;
        } else {
            echo "パスワードが一致しません";
        }
    } else {
        echo "ユーザーが見つかりません";
    }

    return $is_success;
}

function post()
{
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    // $_POST["id"]がある場合はその値をidに格納、ない場合は空文字を格納する
    $pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : "";
    $result = login($id, $pwd);

    if ($result) {
        echo "認証成功";
    } else {
        echo "認証失敗";
    }
}