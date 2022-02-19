<?php

//GETはデータの取得に使われることが多い
//URLが最大で2000文字程度までしか設定できないため、URLにパラメーターを設定するGETは向かない
//GETはURLにパラメーターの情報を持つことができる
//POSTはデータの作成や更新に使用
//POSTのbodyにパラメーターを設定する

$students = [
    '1' => [
        'name' => 'taro',
        'age' => 15,
    ],
    '2' => [
        'name' => 'hanako',
        'age' => 14,
    ],
    '3' => [
        'name' => 'jiro',
        'age' => 12,
    ],
];

$id = $_GET['id'] ?? 1;
$student = $students[$id];
$name = $student['name'];
$age = $student['age'];
?>
<div><?php echo "{$name}は{$age}才です。"; ?></div>