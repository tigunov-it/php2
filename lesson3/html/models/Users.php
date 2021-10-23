<?php
namespace app\models;
class Users extends Model
{
    public $id;
    public $name;
    public $pass;
    public $hash;

    protected $tableName = 'users';

    public function __construct($name = null, $pass = null, $hash = null)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->hash = $hash;
    }


}