<?php

// const TAX_RATE = 0.1;
define("TAX_RATE", 0.1);
//定数の定義はconst , defineの２種類がある
//if分の中ではconstは使えないのでdefineを使用する
//定数が定義されているかを見る関数として"defined"がある

function with_tax($base_price, $tax_rate = TAX_RATE)
{
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);
    return $sum_price;
}
$price = with_tax(1000, 0.08);
echo $price;