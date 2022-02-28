<?php

$user = "test_user";
$pwd = 'pwd';
$host = "localhost";
$dbName = "test_phpdb";
$dsn = "mysql:host={$host};port=3306;dbname={$dbName}";
$conn = new PDO($dsn, $user, $pwd);
$pst = $conn->query("select * from mst_shops");
$res = $pst->fetchAll(PDO::FETCH_ASSOC);
// 連装配列で取得するためにfetchAllの第一引数にPDO::FETCH_ASSOCとする

echo "<pre>";
print_r($res);
echo "</pre>";

$conn = null;