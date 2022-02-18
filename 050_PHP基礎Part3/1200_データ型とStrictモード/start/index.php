<?php

declare(strict_types=1);
// declare(strict_types=1);で厳密モードに切り替えることができる
/**
 * データ型とStrictモード
 */
function add1(int $val): int
// (int $val)で引数valをint型としている、その後の: intで戻り値の型をint型に指定している
{
    return $val + 1;
}
$result = add1(1);
var_dump($result);