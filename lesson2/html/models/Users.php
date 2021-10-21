<?php
namespace models;
class Users extends Model
{
    public $id;
    public $login;
    public $password;

    protected $tableName = 'users';

}