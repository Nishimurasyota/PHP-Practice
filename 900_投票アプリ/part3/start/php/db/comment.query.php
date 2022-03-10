<?php

namespace db;

use db\DataSource;
use model\CommentModel;

class CommentQuery
{

    public static function fetchByTopicId($topic)
    {
        if ($topic->isValidId()) {
            return false;
        }
        $db = new DataSource;
        $sql = '
        SELECT c.*, u.nickname FROM comments c
        INNER JOIN users u
        ON c.user_id = u.id
        WHERE c.topic_id = :id
        AND c.body != ""
        AND c.del_flg != 1
        AND u.del_flg!= 1
        ORDER BY c.id DESC;
        ';

        $result = $db->select($sql, [
            ":id" => $topic->id
        ], DataSource::CLS, CommentModel::class);

        return $result;
    }




    // public static function insert($user) {

    //     $db = new DataSource;
    //     $sql = 'insert into users(id, pwd, nickname) values (:id, :pwd, :nickname)';

    //     $user->pwd = password_hash($user->pwd, PASSWORD_DEFAULT);

    //     return $db->execute($sql, [
    //         ':id' => $user->id,
    //         ':pwd' => $user->pwd,
    //         ':nickname' => $user->nickname,
    //     ]);

    // }
}
