<?php
include "./engine/Autoload.php";

spl_autoload_register([new Autoload(), 'my_autoloader']);

use \models\Products as Products;
use \models\Users as Users;
use \models\Basket as Basket;
use \models\Orders as Orders;

$product = new Products();
$user1 = new Users();
$cart = new Basket();
$order = new Orders();

var_dump($product);
var_dump($user1);
var_dump($cart);
var_dump($order);