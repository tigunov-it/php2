<?php

namespace app\models;

use app\engine\Db;

class Basket extends Model
{

    protected $id;
    protected $user_id;
    protected $item_id;
    protected $session_id;


    public function __construct($item_id = null, $session_id = null)
    {
        $this->item_id = $item_id;
        $this->session_id = $session_id;
    }

    public static function getTableName()
    {
        return 'basket';
    }

    protected $props = [
        'session_id' => false,
        'item_id' => false
    ];

    public static function getBasket($session_id)
    {
        $sql = "SELECT catalog.name as name, catalog.description as description, catalog.price as price, catalog.id as id FROM basket JOIN `catalog` on basket.item_id = catalog.id WHERE session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);

    }

}