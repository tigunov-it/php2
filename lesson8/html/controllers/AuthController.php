<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Users;

class AuthController extends Controller
{
    public function actionLogin() {
//        $login = $_POST['login'];

        $login = (new Request())->getParams()['login'];

//        $pass = $_POST['pass'];
        $pass = (new Request())->getParams()['pass'];

        if (Users::auth($login, $pass)) {
            header('Location:' . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die('Не верный логин или пароль');
        }
    }
    public function actionLogout() {
        session_regenerate_id();
        session_destroy();
        header('Location:' . $_SERVER['HTTP_REFERER']);
        die();
    }
}