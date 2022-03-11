<?php

namespace db;

use db\DataSource;
use model\TopicModel;

class TopicQuery
{
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
        select 
            t.*, u.nickname 
        from topics t 
        inner join users u 
            on t.user_id = u.id 
        where t.del_flg != 1
            and u.del_flg != 1
            and t.published = 1
        order by t.id desc
        ';

        $result = $db->select($sql, [], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function fetchById($topic)
    {

        if (!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource;
        $sql = '
        select 
            t.*, u.nickname 
        from topics t 
        inner join users u 
            on t.user_id = u.id 
        where t.id = :id
            and t.del_flg != 1
            and u.del_flg != 1
        order by t.id desc
        ';

        $result = $db->selectOne($sql, [
            ':id' => $topic->id
        ], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function incrementViewCount($topic)
    {
        if (!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource;

        $sql = 'update topics set views = views + 1 where id = :id';

        return $db->execute($sql, [
            ':id' => $topic->id
        ]);
    }

    public static function isUserOwnTopics($topic_id, $user)
    {

        if (!(TopicModel::validateId($topic_id) && $user->isValidId())) {
            return false;
        }

        $db = new DataSource;
        $sql = '
        SELECT count(1) as count FROM topics t
        WHERE t.id = :topic_id
        and t.user_id = :user_id
        and t.del_flg != 1;
        ';

        $result = $db->selectOne($sql, [
            ':topic_id' => $topic_id,
            ':user_id' => $user->id
        ]);

        return !empty($result) && $result["count"] != 0;
    }

    public static function update($topic)
    {

        $db = new DataSource;
        $sql = 'update topics set published = :published , title = :title where id = :id' ;

        return $db->execute($sql, [
            ':id' => $topic->id,
            ':title' => $topic->title,
            ':published' => $topic->published,
                    ]);
    }
}
