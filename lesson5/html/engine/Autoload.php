<?php

class Autoload
{

    public function my_autoloader($class)
    {
//        include './models/' . $class . '.php';
        $class = str_replace('\\', '/', $class);
        $class = str_replace('app/', '', $class);
        include $class . '.php';
    }
}