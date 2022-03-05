<?php

function get_param($key, $default_val, $is_post = true)
{
    $arr = $is_post ? $_POST : $_GET;
    return $arr[$key] ?? $default_val;
    // $id = $_POST["id"] ?? "";の文を汎用できるようにする
}

function redirect($path)
{
    if ($path === GO_HOME) {
        $path = get_url("");
    } elseif ($path === GO_REFERER) {
        $path = $_SERVER["HTTP_REFERER"];
    } else {
        $path = get_url($path);
    }

    header("Location: {$path}");
    // header()でリダイレクト要求をとばす
    die();
    // PHPの処理を終了する
}

function get_url($path)
{
    return BASE_CONTEXT_PATH . trim($path, "/");
    // trimで$pathの前後に/がある場合は取り除くようにしている
}