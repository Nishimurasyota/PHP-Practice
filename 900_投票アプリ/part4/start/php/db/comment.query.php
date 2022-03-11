<?php 
namespace db;

use db\DataSource;
use model\CommentModel;

class CommentQuery {
    
    public static function fetchByTopicId($topic) {

        if(!$topic->isValidId()) {
            return false;
        }
        
        $db = new DataSource;
        $sql = '
        select 
            c.*, u.nickname 
        from comments c
        inner join users u 
            on c.user_id = u.id 
        where c.topic_id = :id
            and c.body != ""
            and c.del_flg != 1
            and u.del_flg != 1
        order by c.id desc
        ';

        $result = $db->select($sql, [
            ':id' => $topic->id
        ], DataSource::CLS, CommentModel::class);

        return $result;

    }


    public static function insert($comment)
    {

        if (!($comment->isValidTopicId()
        * $comment->isValidBody()
        * $comment->isValidAgree())) {
        return false;
        }

        $db = new DataSource;
        $sql = 'insert into comments(topic_id,body,agree,user_id)
        value(:topic_id, :body, :agree,:user_id)' ;

        return $db->execute($sql, [
            ':user_id' => $comment->user_id,
            ':body' => $comment->body,
            ':agree' => $comment->agree,
            ':topic_id' => $comment->topic_id,
                    ]);
    }
}