<?php

$number = [1, 2, 3, 4];

// $sum = 0;
// foreach ($number as $num) {
//     $sum += $num;
// }
// echo "合計:{$sum}";

function sum($nums)
{
    $sum = 0;
    foreach ($nums as $num) {
        $sum += $num;
    }
    return $sum;
}

//returnの戻り値を$resに代入してechoで出力している

$res = sum($number);
echo "合計:{$res}";