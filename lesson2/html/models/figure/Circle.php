<?php

namespace models\figure;

class Circle extends Figure
{
    public $radius;
    public $pi = 3.14;

    public function __construct($name, $radius)
    {
        $this->radius = $radius;
        parent::__construct($name);
    }

    public function area() {
        return ($this->pi) * (pow(($this->radius),2));
    }

    public function perimeter() {
        return 2*($this->radius)*$this->pi;
    }
}