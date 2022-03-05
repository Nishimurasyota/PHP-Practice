<?php

namespace db;

use db\DataSource;
use model\UserModel;

class UserQuery
{
    public static function fetchById($id)
    {
        $db = new DataSource();
        $sql = "SELECT * FROM users WHERE id = :id;";
        $result = $db->selectOne($sql, [
            ":id" => $id
        ], DataSource::CLS, UserModel::class);
        return $result;
    }

    /**
     * ユーザー登録用関数
     *
     * @param [type] $id
     * @param [type] $pwd
     * @param [type] $nickname
     * @return void
     */
    public static function insert($id, $pwd, $nickname)
    {
        $db = new DataSource();
        $sql = "insert into users(id,pwd,nickname) value(:id,:pwd,:nickname)";

        $pwd = password_hash($pwd, PASSWORD_BCRYPT);
        // pwdのハッシュ化、第一引数でハッシュ化したいpass、第二引数で何を使用してハッシュ化するか指定する

        return $db->execute($sql, [
            ":id" => $id,
            ":pwd" => $pwd,
            ":nickname" => $nickname
        ]);
    }
}