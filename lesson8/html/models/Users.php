<?php
namespace app\models;
class Users extends Model
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false,
        ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function getTableName()
    {
        return 'users';
    }

    public static function auth($login, $pass) {
        $user = Users::getOneWhere('login', $login);

        if ($user != false && password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            return true;
        }
            return false;
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function isAdmin() {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'] == 'admin';
        }

    }

    public static function getName() {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        }

    }


}