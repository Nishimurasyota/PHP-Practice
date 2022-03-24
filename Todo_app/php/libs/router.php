<?php

namespace lib;

use throwable;

function route($rpath, $method)
{
    try {
        if ($rpath === "") {
            $rpath = "home";
        }

        $targetFile = SOURCE_BASE . "controllers/{$rpath}.php";
        // $targetFileに読み込む対象のcontrollerが格納される

        if (!file_exists($targetFile)) {
            require_once SOURCE_BASE . "/views/404.php";
            return;
        }
        // $targetFileがない場合は404ページにリンクするようにして、returnで以降の処理を行わないようにする

        require_once $targetFile;


        $fn = "\\controller\\{$rpath}\\{$method}";
        $fn();
    } catch (throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        Msg::push(Msg::ERROR, "何かがおかしいようです");
        require_once SOURCE_BASE . "/views/404.php";
    }
}