<?php
namespace app\models;
class Basket extends Model
{
    public $id;
    public $user_id;
    public $item_id;
    public $price;
    public $count;

    protected $tableName = 'basket';
}