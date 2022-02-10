<?php

if (1 == "1") {
    echo "true";
} else {
    echo "false";
}
?>
<br>
<?php
if (1 === "1") {
    echo "true";
} else {
    echo "false";
}


//===の時は型が同じどうかも確認する、基本は===が望ましい

//falsyな値
/*
"" (空文字)
0 (数値、文字列)
null
false
*/