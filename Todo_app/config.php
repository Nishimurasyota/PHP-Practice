<?php

define("CURRENT_URI", $_SERVER["REQUEST_URI"]);

if (preg_match("/\/todo/", CURRENT_URI, $match)) {
    define("BASE_CONTEXT_PATH", $match[0] ."/");
}

define("BASE_IMAGE_PATH", BASE_CONTEXT_PATH . "imgs/");
define("BASE_CSS_PATH", BASE_CONTEXT_PATH . "css/");
define("BASE_JS_PATH", BASE_CONTEXT_PATH . "js/");
define("SOURCE_BASE", __DIR__ . "/php/");