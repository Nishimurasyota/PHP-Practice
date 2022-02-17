<?php

/**
 * ファイル分割の方法を学ぼう
 * 
 * - require、includeの違い
 * - require、require_onceの使い方
 */
$arry = [
    'num' => 0
];

require("file1.php");
require("file2.php");
require_once("file2.php");
//ファイルを読み込みたい場合はrequire or includeを使用する
//読み込みを一回だけにしたい場合はrequire_onceを使用する
//file2は２回読み込んでいるがrequire_onceで表示されているのは２回だけ

//includeではファイルの名前が違っていても後続の処理は行われるが、requireは[Fatal error]となり処理がストップする
//requireは必須のファイルに、includeは最悪無くてもいいファイルに使われることが多い

fn1();
//読み込んだファイルの関数は宣言することで使用できる