<?php

namespace app\traits;

trait TSingletone
{
    private static $instance = null;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static(); // new static = new Db
        }
        return static::$instance;
    }

    private function __construct() { } // приватный конструктор, чтобы нельзя было снаружи создавать экземпляр класса
}