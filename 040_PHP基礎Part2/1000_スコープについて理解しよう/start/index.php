<?php

$a = 0;
// echo $a;
function fn2()
{
    global $a;
    echo "{$a}";
    //    関数の外にある変数を参照する場合は[global]を前に記載する
}

fn2();