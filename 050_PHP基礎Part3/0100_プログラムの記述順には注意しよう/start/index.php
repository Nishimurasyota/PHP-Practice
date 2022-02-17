<?php
function counter($step = 1)
{
    global $num;
    $num += $step;
    echo $num;
    return $num;
}

// counter(2);
// $num = 0;

// 上の場合だとcounterがnumよりも先に宣言されているので
// numが未定義で関数が実行されている、そのため関数ないのnumにはnull(0)が代入されて処理が進む

$num = 0;
counter(2);