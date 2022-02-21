<?php
session_start();

use app\engine\Db;
use app\models\Products;
use app\models\Users;
use app\models\Basket;
use app\models\Orders;
use app\engine\Render;
use app\engine\Request;

include "./engine/Autoload.php";

spl_autoload_register([new Autoload(), 'my_autoloader']);
require_once './vendor/autoload.php'; // автозагрузчик twig

try {
    $url = explode('/', $_SERVER['REQUEST_URI']);

    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";


    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
//    $controller = new $controllerClass(new \app\engine\TwigRender());
        $controller->runAction($actionName);
    } else {
        Die('404');
    }
} catch (Exception $e) {
    var_dump($e->getMessage());
}


//var_dump(password_hash(321, PASSWORD_DEFAULT)); // Пароль Пети

//$controllerName = $url['1'] ?: 'product';
//$actionName = $url['2'] ?? null;
//
//$controllerClass = "app\\controllers\\" . ucfirst($controllerName) . "Controller";
//
//
//if (class_exists($controllerClass)) {
//    $controller = new $controllerClass(new Render());
////    $controller = new $controllerClass(new \app\engine\TwigRender());
//    $controller->runAction($actionName);
//} else {
//    Die('404');
//}

//$product = new Products("Фара противотуманная2", "Является дополнительным источником освещения", "900", "plug.jpg");
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


