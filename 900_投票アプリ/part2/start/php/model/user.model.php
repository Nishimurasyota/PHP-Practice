<?php

namespace model;

class UserModel extends AbstractModel
{
    public string $id;
    public string $pwd;
    public string $nickname;
    public int $del_flg;

    protected static $SESSION_NAME = "_user";
    //_userはメソッドを通じて使用する
}