<?php
require_once "config.php";

//Model
require_once SOURCE_BASE . "models/abstract.model.php";
require_once SOURCE_BASE . "models/user.model.php";

//Library
require_once SOURCE_BASE . "libs/helper.php";
require_once SOURCE_BASE . "libs/router.php";
require_once SOURCE_BASE . "libs/auth.php";
require_once SOURCE_BASE . "libs/message.php";

//DB
require_once SOURCE_BASE . "db/datasource.php";
require_once SOURCE_BASE . "db/user.query.php";

use function lib\route;

session_start();

use lib\Msg;

try {
    require_once SOURCE_BASE . "partials/header.php";

    $rpath = str_replace(BASE_CONTEXT_PATH, "", (CURRENT_URI));
    // str_replace()で第一引数を第二引数に置換する、対象となる値を第三引数に記載する
    // 今回では$_SERVER["REQUEST_URI"]内でBASE_CONTEXT_PATHと一致する部分を空文字に置換して$rpathに格納している

    $method = strtolower($_SERVER["REQUEST_METHOD"]);

    route($rpath, $method);

    require_once SOURCE_BASE . "partials/footer.php";
} catch (throwable $e) {
    die("何かがすごくおかしいようです");
}