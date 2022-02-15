<?php

$char = "aAabd1_sscc";
if (preg_match("/aAa/", $char, $res)) {
    echo "検索成功";
    print_r($res);
}