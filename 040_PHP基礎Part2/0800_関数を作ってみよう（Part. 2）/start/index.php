<?php

$price = 1;

function with_tax($val, $tax)
//引数に[=]をつけて値を入力しておくと初期値として設定される。
//引数の値がない場合に適応される
{
    $sum_price = $val + ($val * $tax);
    $sum_price = round($sum_price);
    //roundは四捨五入する関数、第一引数に値を第二引数にどの値まで四捨五入するかを入れる
    return $sum_price;
}

$fn = "with_tax";
$price = $fn($price, 0.1);
//"with_tax"の文字列を変数fnに代入して関数を実行しても
//fn = with_taxなのでwith_tax関数が実行される

echo "{$price}";