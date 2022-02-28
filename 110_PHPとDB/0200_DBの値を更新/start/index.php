<?php

/**
 * DBの値を更新
 */
$user = 'test_user';
$pwd = 'pwd';
$host = 'localhost';
$dbName = 'test_phpdb';
$dsn = "mysql:host={$host};port=8889;dbname={$dbName};";
$conn = new PDO($dsn, $user, $pwd);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$res = $conn->exec('update mst_prefs set name = "福島" where id = 5');
// 更新のメソッドを流す時はexecを使用する
echo '<pre>';
print_r($res);
echo '</pre>';

$conn = null;