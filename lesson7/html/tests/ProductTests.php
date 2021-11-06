<?php

use PHPUnit\Framework\TestCase;
use app\models\Products;

class ProductTests extends TestCase
{
    public function testProduct() {
        $name = "Фара противотуманная";
        $description = "Является дополнительным источником освещения";
        $price = 1000000;

        $product = new Products($name, $description, $price);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($description, $product->description);
        $this->assertEquals($price, $product->price);
    }
}