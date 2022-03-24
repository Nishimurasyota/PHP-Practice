<?php

namespace controller\register;

use model\UserModel;

use lib\Auth;
use lib\Msg;

function get()
{
    require_once SOURCE_BASE . "views/register.php";
}

function post()
{

    $user = new UserModel;
    $user->id = get_param("id", "");
    $user->pwd = get_param("pwd", "");
    $user->nickname = get_param("nickname", "");

    if (Auth::regist($user)) {
        redirect(GO_HOME);
        Msg::push(Msg::INFO, "{$user->nickname}さん、ようこそ");
    } else {
        redirect(GO_REFERER);
    }
}