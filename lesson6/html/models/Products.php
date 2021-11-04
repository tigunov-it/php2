<?php
namespace app\models;
class Products extends Model
{
    protected $id; // Ругается на id
    protected $name;
    protected $description;
    protected $price;
    protected $photo;

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'photo' => false,
    ];

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