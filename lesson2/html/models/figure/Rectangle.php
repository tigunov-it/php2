<?php
namespace models\figure;
class Rectangle extends Figure
{
    public $h;
    public $w;

    public function __construct($name, $h, $w)
    {
        $this->h = $h;
        $this->w = $w;
        parent::__construct($name);
    }

    public function area() {
        return $this->h * $this->w;
    }

    public function perimeter() {
        return 2*($this->h+$this->w);
    }
}