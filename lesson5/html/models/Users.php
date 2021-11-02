<?php
namespace app\models;
class Users extends Model
{
    protected $id;
    protected $name;
    protected $pass;
    protected $hash;

    protected $props = [
        'name' => false,
        'pass' => false,
        'hash' => false,
        ];


    public static function getTableName()
    {
        return 'users';
    }



    public function __construct($name = null, $pass = null, $hash = null)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->hash = $hash;
    }


}