<?php
require_once "config.php";

require_once SOURCE_BASE . "partials/header.php";

$rpath = str_replace(BASE_CONTEXT_PATH, "", $_SERVER["REQUEST_URI"]);

$method = strtolower($_SERVER["REQUEST_METHOD"]);

root($rpath, $method);

function root($rpath, $method)
{
    if ($rpath === "") {
        $rpath = "home";
    }

    $targetFile = SOURCE_BASE . "controllers/{$rpath}.php";

    if (!file_exists($targetFile)) {
        require_once SOURCE_BASE . "views/404.php";
        return;
    }
    require_once $targetFile;

    $fn = "\\controller\\{$rpath}\\{$method}";

    $fn();
}



// if ($_SERVER["REQUEST_URI"] === "/poll/part1/start/login") {
//     require_once SOURCE_BASE . "controllers/login.php";
// } else if ($_SERVER["REQUEST_URI"] === "/poll/part1/start/home") {
//     require_once SOURCE_BASE . "controllers/home.php";
// } else if ($_SERVER["REQUEST_URI"] === "/poll/part1/start/register") {
//     require_once SOURCE_BASE . "controllers/register.php";
// }

require_once SOURCE_BASE . "partials/footer.php";