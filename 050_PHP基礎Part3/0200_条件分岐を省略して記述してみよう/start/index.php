<?php

$arr = [
    "key" => 10,
];

// if (isset($arr["key"])) {
//     $arr["key"] *= 10;
// } else {
//     $arr["key"] = 1;
// }

//keyに値があれば10をかけて、ない場合は1を代入する

// $arr["key"] = isset($arr["key"]) ? $arr["key"] * 10 : 1;
//=以下でif文の内容を三項演算子で表現している

$arr["key"] = $arr["key"] ?? 1;
//null型演算子
// $arr["key"]がnullの場合、1が代入される
// $arr["key"]がnull以外の場合、??の左にある$arr["key"]が代入される
//三項演算子で表現すると以下のようになる
//$arr["key"] = isset($arr["key"]) ? $arr["key"] : 1;

echo $arr["key"];