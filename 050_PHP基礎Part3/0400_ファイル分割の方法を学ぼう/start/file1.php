<?php
if (!function_exists("fn1")) {
    //function_existsで関数が宣言されているか確認ができる
    //!を前につけているから、fn1がない場合は関数が実行（true）される
    function fn1()
    {
        echo "fn1 is called";
    }
}