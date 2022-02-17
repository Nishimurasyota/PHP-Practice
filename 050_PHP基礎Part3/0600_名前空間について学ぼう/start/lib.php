<?php

namespace lib;
//名前空間の命名はnamespaceで記述
//名前空間では関数、定数、classが登録できる
//名前空間ではdefineでの定数宣言はできない、constのみ

const TAX_RATE = 0.1;

function with_tax($base_price, $tax_rate = TAX_RATE)
{
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);
    return $sum_price;
}