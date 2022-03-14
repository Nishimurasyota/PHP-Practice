<?php

namespace db;

use db\DataSource;
use model\UserModel;

class UserQuery
{
    public static function fetchByID($id)
    {
        $db = new DataSource;
        $sql = 'select * from users where id = :id;';
        return $db->selectOne($sql, [
            ":id" => $id
        ], DataSource::CLS, UserModel::class);
    }

    public static function insert($id, $pwd, $nickname)
    {
        $db = new DataSource;
        $sql = '
        insert into users (id, pwd, nickname)
        values(:id, :pwd, :nickname);';

        $pwd = password_hash($pwd, PASSWORD_BCRYPT);

        return $db->execute($sql, [
            ":id" => $id,
            ":pwd" => $pwd,
            ":nickname" => $nickname
        ]);
    }

}
