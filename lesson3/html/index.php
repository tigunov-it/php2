<?php
include "./engine/Autoload.php";

spl_autoload_register([new Autoload(), 'my_autoloader']);

use app\models\Products as Products;
use app\models\Users as Users;
use app\models\Basket as Basket;
use app\models\Orders as Orders;


$product = new Products("Фара противотуманная", "Является дополнительным источником освещения", "900", "plug.jpg");
$product->insert();
var_dump($product);
var_dump(get_class_methods($product));

$user2 = new Users("Владимир", "777");
var_dump($user2);
var_dump(get_class_methods($user2));

//$user1 = new Users();
//$cart = new Basket();
//$order = new Orders();

//var_dump($product->getOne(1));
//var_dump($product->getAll());
//var_dump($user1->getAll());
//var_dump($user1->getOne(1));


