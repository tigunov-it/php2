<?php
include "./engine/Autoload.php";

spl_autoload_register([new Autoload(), 'my_autoloader']);
require_once './vendor/autoload.php'; // автозагрузчик twig


use app\engine\Db as Db;
use app\models\Products as Products;
use app\models\Users as Users;
use app\models\Basket as Basket;
use app\models\Orders as Orders;
use app\engine\Render;


$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'] ?? null;

$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
//    $controller = new $controllerClass(new Render());
    $controller = new $controllerClass(new \app\engine\TwigRender());
    $controller->runAction($actionName);
} else {
    Die('404');
}



//$product = new Products("Фара противотуманная", "Является дополнительным источником освещения", "900", "plug.jpg");
//$product->insert();
//$product->delete();
//var_dump($product);


//$user2 = new Users("Владимир", "777", '19720108286164135db632e5.71871079');
//$user2->insert();
//$user2->delete(12);


//$user1 = new Users();
//$cart = new Basket();
//$order = new Orders();

//var_dump($product->getOne(1));
//var_dump($product->getAll());
//var_dump($user1->getAll());
//var_dump($user1->getOne(1));


