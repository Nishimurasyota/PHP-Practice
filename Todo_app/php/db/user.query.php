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

    public static function insert($user)
    {
        $db = new DataSource;
        $sql = '
        insert into users (id, pwd, nickname)
        values(:id, :pwd, :nickname);';

        $user->pwd = password_hash($user->pwd, PASSWORD_BCRYPT);

        return $db->execute($sql, [
            ":id" => $user->id,
            ":pwd" => $user->pwd,
            ":nickname" => $user->nickname
        ]);
    }

}
