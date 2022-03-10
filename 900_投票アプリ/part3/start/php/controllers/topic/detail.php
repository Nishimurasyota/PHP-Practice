<?php

namespace controller\topic\detail;

use lib\Auth;
use db\CommentQuery;
use model\UserModel;
use lib\Msg;
use model\TopicModel;
use db\TopicQuery;

function get()
{

    $topic = new TopicModel;
    $topic->id = get_param("topic_id", null, false);

    $topic = TopicQuery::fetchById($topic);
    $comments = CommentQuery::fetchByTopicId($topic);
    
    if (!$topic) {
        Msg::push(Msg::ERROR, "トピックが見つかりません");
        redirect("404");
    }

    \view\topic\detail\index($topic, $comments);
}
