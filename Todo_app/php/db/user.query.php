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
}
