<?php
require_once "config.php";

require_once SOURCE_BASE . "partials/header.php";

$rpath = str_replace(BASE_CONTEXT_PATH, "", ($_SERVER["REQUEST_URI"]));
// str_replace()で第一引数を第二引数に置換する、対象となる値を第三引数に記載する
// 今回では$_SERVER["REQUEST_URI"]内でBASE_CONTEXT_PATHと一致する部分を空文字に置換して$rpathに格納している

$method = strtolower($_SERVER["REQUEST_METHOD"]);


route($rpath, $method);
function route($rpath, $method)
{
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
}


require_once SOURCE_BASE . "partials/footer.php";
