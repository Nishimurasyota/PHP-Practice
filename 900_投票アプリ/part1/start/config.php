<?php

$uri = $_SERVER["REQUEST_URI"];
// echo $url;

if (preg_match("/(.+start|end)/i", $uri, $match)) {
    define("BASE_CONTEXT_PATH", $match[0] . "/");
}

define("BASE_IMAGES_PATH", BASE_CONTEXT_PATH . "images/");
define("BASE_JS_PATH", BASE_CONTEXT_PATH . "js/");
define("BASE_CSS_PATH", BASE_CONTEXT_PATH . "css/");
define("SOURCE_BASE", __DIR__ . "/php/");