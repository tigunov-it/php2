<?php
namespace app\models;
class Basket extends Model
{
    public $session_id;
    public $product_id;

//    protected $tableName = 'basket';

    public static function getTableName()
    {
        return 'basket';
    }

    protected $props = [
        'session_id' => false,
        'product_id' => false
    ];

    public function __construct($session_id = null, $product_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }

    public static function getBasket($session_id) {
        $sql = "SELECT basket.id basket_id, products.id prod_id, products.name, products.description, products.price FROM `basket`,`products` WHERE `session_id` = :session_id AND basket.product_id = products.id";

        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

}