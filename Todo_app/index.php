<?php
require_once "config.php";

require_once SOURCE_BASE . "partials/header.php";

if ($_SERVER["REQUEST_URI"] == "/todo/login") {
    require_once SOURCE_BASE . "controllers/login.php";
} else if ($_SERVER["REQUEST_URI"] == "/todo/") {
    require_once SOURCE_BASE . "controllers/home.php";
} else if ($_SERVER["REQUEST_URI"] == "/todo/register") {
    require_once SOURCE_BASE . "controllers/register.php";
}

require_once SOURCE_BASE . "partials/footer.php";
