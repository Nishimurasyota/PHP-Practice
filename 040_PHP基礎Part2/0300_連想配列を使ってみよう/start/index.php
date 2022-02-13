<?php

$arr = [
    "name" => "Bob",
    "age" => 24,
    "sports" => ["baseball", "karate"],
];

echo $arr["name"];
echo $arr["age"];
echo $arr["sports"][0];

//$arr[]で指定したキーに対応する値を出力している
//sportsは配列のため[]でindexの番号も明示している

?>

<br>

<?php
$arr["age"] = 12;
echo $arr["age"];

//特定のキーを削除する場合はunset()を使用する
//unset($arr["name"])のような記述になる