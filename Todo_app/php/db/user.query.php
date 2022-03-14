<?php

namespace db;

use db\DataSource;
use model\UserModel;

class UserQuery
{
    public static function fetchByID($id)
    {
        $db = new DataSource;
        $sql = "SELECT * FROM users u WHERE u.id = :id ";
        return $db->selectOne($sql, [
            ":id" => $id
        ], DataSource::CLS, UserModel::class);
    }
}
