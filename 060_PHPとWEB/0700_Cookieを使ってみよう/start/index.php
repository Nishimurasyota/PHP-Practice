<?php

//cookieの値を設定する場合はsetcookieを使用する
setcookie("VISIT_COUNT", 1, [
    //VISIT_COUNTというキーに対して1の値を保持している
    "expires" => time() + 60 * 60 * 24 * 30,
    // 有効期限を示すexpiresにtime() + とすることで現在の時刻＋αの有効期限を設定する
    // 今回の場合は30日の有効期限を設定している
    "path" => "/",
    //pathで指定・包含されたURLにアクセスした際にcookieが設定できる

    //secureはHTTPS通信の時にやり取りされる（true,false）が入ってくる
    //trueの場合はHTTPS通信の時のみ値を送信する

    //HttpOnlyはJavaScriptでのcookieを操作する値
    //trueにしておくとJavaScriptでcookieの値を操作できない
]);

var_dump($_COOKIE["VISIT_COUNT"]);