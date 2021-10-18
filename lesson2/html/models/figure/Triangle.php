<?php

namespace models\figure;

class Triangle extends Figure
{
    public $a = null;
    public $b = null;
    public $c = null;
    public $angle;


    public function __construct($name, $a, $b, $c, $angle)
    {
        $this->a = $a;
        $this->b = $b;
        $this->angle = $angle;
        parent::__construct($name);
    }

    public function area(){
        return 0.5*($this->a)*($this->b)*sin($this->angle);
    }

    public function perimeter() {
        return $this->a+$this->b+$this->c;
    }

}