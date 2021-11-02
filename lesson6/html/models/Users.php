<?php
namespace app\models;
class Users extends Model
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false,
        ];


    public static function getTableName()
    {
        return 'users';
    }

    public static function auth($login, $pass) {
        $user = Users::getOneWhere('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
            return false;
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public static function getName() {
        return $_SESSION['login'];

    }

    public function __construct($login = null, $pass = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }
}