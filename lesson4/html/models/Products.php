<?php

namespace app\models;
class Products extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $photo;
//    protected $tableName = 'catalog';

    public static function getTableName()
    {
        return 'catalog';
    }

    public function __construct($name = null, $description = null, $price = null, $photo = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->photo = $photo;
    }


}