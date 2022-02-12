<?php

$arr = [
    ["table", 1000],
    ["chair", 500],
    ["bed", 4000],
    ["rich_chair", 1500],
    ["good_bed", 10000],
];

$arr[1][1] = 700;
//chairはarr配列の１番目、500の数値は個要素の配列の１番目だからarr[1][1]で指定する

//array_shift($arr);
//array_shiftは配列の１番目を削除する間数

// array_pop($arr);
//array_popは配列の最後を削除する間数

array_splice($arr, 1, 1);
//array_spliceは()内で第一引数に指定する配列を、第二引数でindexを、第三引数でどれだけ消すかを指定する
//第三引数がしていない場合は、それ以降全て削除する
//第四引数に代入したい値を入れることで、削除した部分に入れることができる

foreach ($arr as $val) {
    echo "{$val[0]}は{$val[1]}円です";
}
//$val[0]にtablenなどの文字列が、[1]に数値が格納されている