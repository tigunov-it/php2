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
        return $_SESSION['login'] == 'admin';
    }

    //Warning: Undefined array key "login" in /var/www/html/models/Users.php on line 44 до того, как пользователь залогитется, выходит ошибка. Почему?
    public static function getName() {
        return $_SESSION['login'];
    }


}