<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('./templates');

$twig = new \Twig\Environment($loader);

//$twig = new \Twig\Environment($loader, [ // включаем кэширование
//    'cache' => './compilation_cache',
//]);

echo $twig->render('index.twig', ['name' => 'Fabien']);

