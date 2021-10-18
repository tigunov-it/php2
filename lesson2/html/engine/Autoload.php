<?php

class Autoload
{

    public function my_autoloader($class)
    {
//        include './models/' . $class . '.php';
        $class = str_replace('\\', '/', $class);
        include $class . '.php';
    }
}