<?php

/**
 * 税率計算のための関数を記述するためのファイル
 */

/**
 * 税込み金額を取得する関数としてwith_taxを定義
 */

function with_tax($base_price, $tax_rate = 0.1)
{
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);
    return $sum_price;
}