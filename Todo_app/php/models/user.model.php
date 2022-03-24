<?php

namespace model;

use lib\Msg;

class UserModel extends AbstractModel
{
    public string $id;
    public string $pwd;
    public string $nickname;
    public int $del_flg;

    protected static $SESSION_NAME = "_name";

    public function isValidId()
    {
        return static::validateId($this->id);
    }

    public static function validateId($val)
    {
        $res = true;
        if (empty($val)) {
            Msg::push(Msg::ERROR, "IDを入力してください");
            $res = false;
        } else {
            if (strlen($val) > 10) {
                Msg::push(Msg::ERROR, "IDは10文字以内で入力してください");
                $res = false;
            }
            if (!preg_match("/^[a-zA-Z0-9]+$/", $val)) {
                Msg::push(Msg::ERROR, "IDは半角英数字で入力してください");
                $res = false;
            }
        }
        return $res;
    }
}