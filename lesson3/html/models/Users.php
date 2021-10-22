<?php
namespace app\models;
class Users extends Model
{
    public $id;
    public $login;
    public $password;

    protected $tableName = 'users';

    public function __construct($login = null, $password = null)
    {
        $this->login = $login;
        $this->password = $password;
    }

}