<?php

require "lib.php";

// $price = \lib\with_tax(1000, 0.08);
// echo $price;
// echo \lib\TAX_RATE;
//名前空間の関数などを実行する場合\\で名前空間を囲む必要がある

use function lib\with_tax;

$price = with_tax(1000, 0.08);
echo $price;

// use functionでlibのwith_tax関数をコピーすることにより、実行の際に名前空間を宣言しなくていい
//定数の場合はfunctionがconstに変わったりする