<?php
namespace models;
class Products extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    protected $tableName = 'products';
}