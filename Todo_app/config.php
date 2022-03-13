<?php
$url = $_SERVER["REQUEST_URI"];

if (preg_match("/todo/", $url, $match)) {
    define("BASE_CONTEXT_PATH",$match[0] . "/");
}

define("BASE_IMAGE_PATH", BASE_CONTEXT_PATH . "imgs/");