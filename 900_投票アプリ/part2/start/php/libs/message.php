<?php

namespace lib;

use model\AbstractModel;
use Throwable;

class Msg extends AbstractModel
{
    protected static $SESSION_NAME = "_msg";

    public const ERROR = "error";
    public const INFO = "info";
    public const DEBUG = "debug";

    public static function push($type, $msg)
    {
        if (!is_array(static::getSession())) {
            static::init();
            // static::getSessionで情報が取れない場合、initで配列として初期化する
        }

        $msgs = static::getSession();
        $msgs[$type][] = $msg;
        static::setSession($msgs);
    }

    public static function flush()
    {
        try {

            $msg_with_type = static::getSessionAndFlush() ?? [];

            foreach ($msg_with_type as $type => $msgs) {
                // $typeにはstatic::ERROR(INFO,DEBUG)が渡ってきて、msgsには[]が渡ってくる

                // $typeでDEBUGが回ってきて、DEBUGがfalseの場合、次のループを実行する
                if ($type === static::DEBUG && !DEBUG) {
                    continue;
                }

                foreach ($msgs as $msg) {
                    echo "<div>{$type}:{$msg}</div>";
                }
            }
        } catch (Throwable $e) {

            Msg::push(Msg::DEBUG, $e->getMessage());
            Msg::push(Msg::DEBUG, "Msg::Flushで例外が発生しました");
        }
    }

    private static function init()
    {
        static::setSession([
            static::ERROR => [],
            static::INFO => [],
            static::DEBUG => []
        ]);
    }
}