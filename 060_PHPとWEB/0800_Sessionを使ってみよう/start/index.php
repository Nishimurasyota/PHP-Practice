<?php

session_start();
//この関数でsessionを有効にする

$_SESSION["VISIT_COUNT"] = 1;
echo $_SESSION["VISIT_COUNT"];
phpinfo();