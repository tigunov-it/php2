<?php

namespace models\figure;
abstract class Figure
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function showFigure() {
        return "Вы выбрали {$this->name}";
    }
}