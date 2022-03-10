<?php

namespace db;

use db\DataSource;
use model\TopicModel;

class TopicQuery
{
    // ユーザーのIDを使用して投稿を検索する関数
    public static function fetchByUserId($user)
    {


        if (!$user->isValidId()) {
            return false;
        }

        $db = new DataSource;
        $sql = 'select * from topics where user_id = :id and del_flg != 1 order by id desc;';

        $result = $db->select($sql, [
            ':id' => $user->id
        ], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function fetchPublishedTopics()
    {
        $db = new DataSource;
        $sql = '
        SELECT t.*,u.nickname FROM topics t
        INNER JOIN users u
        ON t.user_id = u.id
        WHERE  t.published = 1
        AND t.del_flg != 1
        ORDER BY t.user_id DESC;

        ';

        $result = $db->select($sql, [], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function fetchById($topic)
    {

        if ($topic->isValidId()) {
            return false;
        }

        $db = new DataSource;
        $sql = '
        SELECT
            t.*,u.nickname
        FROM topics t
        INNER JOIN users u
            ON t.user_id = u.id
        WHERE t.id = :id
            AND t.published = 1
            AND u.del_flg != 1
            AND t.del_flg != 1
        ORDER BY t.user_id DESC;

        ';

        $result = $db->selectOne($sql, [
            ":id" => $topic->id
        ], DataSource::CLS, TopicModel::class);

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
