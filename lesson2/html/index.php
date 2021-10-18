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

echo "<br>";
echo "<b>Прямоугольник</b>" . '<br>';
$rectangle1 = new \models\figure\Rectangle('Первый прямоугольник', 100, 50);
echo $rectangle1->showFigure() . '<br>';
echo $rectangle1->area() . ' Его площадь <br>';
echo $rectangle1->perimeter() . ' Его периметр <br>';

echo "<br>";
echo "<b>Круг</b>" . '<br>';
$circle1 = new \models\figure\Circle('Первый круг', 200);
echo $circle1->showFigure() . '<br>';
echo $circle1->area() . ' Его площадь <br>';
echo $circle1->perimeter() . ' Длина окружности <br>';

echo "<br>";
echo "<b>Треугольник</b>" . '<br>';
$triangle1 = new \models\figure\Triangle('Первый треугольник', 10, 15, 10, 45);
echo $triangle1->showFigure() . '<br>';
echo $triangle1->area() . ' Его площадь <br>';
echo $triangle1->perimeter() . ' Его периметр <br>';