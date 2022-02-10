<?php

$testValue = 69;

if ($testValue < 50) {
    echo "不合格";
} elseif ($testValue >= 50 && $testValue < 70) {
    echo "合格";
} else {
    echo "秀";
}

//&&で２つの条件を満たす場合はtrueになる
//||で２つの条件のうち片方を満たす場合はtrueになる