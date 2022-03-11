<?php 
namespace controller\topic\detail;

use db\CommentQuery;
use lib\Msg;
use db\TopicQuery;
use model\TopicModel;

function get() {

    $topic = new TopicModel;
    $topic->id = get_param('topic_id', null, false);

    TopicQuery::incrementViewCount($topic);

    $fetchedTopic = TopicQuery::fetchById($topic);
    $comments = CommentQuery::fetchByTopicId($topic);

    if(empty($fetchedTopic) || !$fetchedTopic->published) {
        // $fetchedTopicが空もしくはpublishedの値がfalseの場合、以下の文章を実行する
        Msg::push(Msg::ERROR, 'トピックが見つかりません。');
        redirect('404');
    }

    \view\topic\detail\index($fetchedTopic, $comments);
   
}