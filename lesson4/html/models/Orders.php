<?php
namespace app\models;
class Orders extends Model
{
    public $id;
    public $user_id;
    public $item_id;
    public $price;
    public $count;

//    protected $tableName = 'orders';

    public static function getTableName()
    {
        return 'orders';
    }
}