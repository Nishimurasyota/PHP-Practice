<?php
function counter($step = 1)
{
    global $num;
    $num += $step;
    echo $num;
    return $num;
}

counter(2);
$num = 0;