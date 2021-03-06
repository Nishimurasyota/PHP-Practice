<?php

namespace lib;

use db\UserQuery;
use model\UserModel;
use throwable;

class Auth
{
    public static function login($id, $pwd)
    {
        try {

            if (!(UserModel::validateId($id)
                * UserModel::validatePwd($pwd))) {
                return false;
            }


            $is_success = false;

            $user = UserQuery::fetchById($id);

            if (!empty($user) && $user->del_flg !== 1) {
                if (password_verify($pwd, $user->pwd)) {
                    $is_success = true;
                    UserModel::setSession($user);
                } else {
                    Msg::push(Msg::ERROR, "パスワードが一致しません");
                }
            } else {
                Msg::push(Msg::ERROR, "IDが一致しません");
            }
        } catch (Throwable $e) {

            $is_success = false;
            Msg::push(Msg::DEBUG, $e->getMessage());
            Msg::push(Msg::ERROR, "ログイン処理でエラーが発生しました");
        }

        return $is_success;
    }

    public static function regist($user)
    {
        try {
            // validateIDがfalseで返ってきた場合の処理
            if (
                !($user->isValidId()
                    * $user->isValidPwd()
                    * $user->isValidNickname())
            ) {
                return false;
            }
            $is_success = false;

            $exist_user = UserQuery::fetchById($user->id);

            if (!empty($exist_user)) {
                Msg::push(Msg::ERROR, "ユーザーが既に存在します");
                return false;
            }

            $is_success = UserQuery::insert($user);

            if ($is_success) {
                UserModel::setSession($user);
            }
        } catch (throwable $e) {

            $is_success = false;
            Msg::push(Msg::DEBUG, $e->getMessage());
            Msg::push(Msg::ERROR, "登録処理でエラーが発生しました");
        }

        return $is_success;
    }


    public static function isLogin()
    {
        try {

            $user = UserModel::getSession();
        } catch (throwable $e) {

            UserModel::clearSession();
            Msg::push(Msg::DEBUG, $e->getMessage());
            Msg::push(Msg::ERROR, "エラーが発生しました。再度ログインするようにしてください。");
            return false;
        }

        if (isset($user)) {
            return true;
        } else {
            return false;
        }
    }

    public static function logout()
    {
        try {
            UserModel::clearSession();
        } catch (throwable $e) {

            Msg::push(Msg::DEBUG, $e->getMessage());
            return false;
        }
        return true;
    }
}