<?php

namespace controller\topic\create;

use db\TopicQuery;
use lib\Auth;
use model\TopicModel;
use model\UserModel;
use Throwable;
use lib\Msg;

function get()
{
    Auth::requireLogin();

    $topic = TopicModel::getSessionAndFlush();
    // エラーが起きてsessionに保存されたデータがある場合、変数に格納してsessionをクリアにする

    if (empty($topic)) {
        $topic = new TopicModel;
        $topic->id = -1;
        $topic->title = "";
        $topic->published = 1;
    }

    \view\topic\edit\index($topic, false);
}

function post()
{
    Auth::requireLogin();

    $topic = new TopicModel;
    $topic->id = get_param("topic_id", null);
    $topic->title = get_param("title", null);
    $topic->published = get_param("published", null);

    try {
        $user = UserModel::getSession();
        $is_success = TopicQuery::insert($topic, $user);
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        $is_success = false;
    }

    if ($is_success) {
        Msg::push(Msg::INFO, "トピックの登録に成功しました");
        redirect("topic/archive");
    } else {
        Msg::push(Msg::ERROR, "トピックの登録に失敗しました");
        TopicModel::setSession($topic);
        // エラーが起きた時の情報をsession2保存する
        redirect(GO_REFERER);
    }
}
