<?php
var_dump($_POST);

$num = $_POST["num"];
$price = $_POST["price"];
$discount = $_POST["discount"];
$sum = $num * $price;
$sum -= $sum * $discount / 100;

echo '合計' . round($sum) . '円';
//小数点が出る可能性があるのでroundで四捨五入する