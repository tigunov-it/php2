<?php
class Product
{
    public $name;
    public $price;
    public $photo;

    public function __construct($name, $price, $photo)
    {
        $this->name = $name;
        $this->price = $price;
        $this->photo = $photo;
    }

    public function info()
    {
        echo "Информция о товаре {$this->name}";
    }

}

class PhysicalProduct extends Product { //Физический товар, который может быть доставлен покупателю

    public $weight; //Вес


    public function __construct($name, $price, $photo, $weight)
    {
        $this->weight = $weight;
        parent::__construct($name, $price, $photo);
    }
    public function addToCart() {
        echo "{$this->name} Добавлен в корзину";
    }
}

class DigitalProduct extends Product { //Цифровой товар (книги и каталоги) для загрузок

    public $size; //объем в мегабайтах

    public function __construct($name, $price, $photo, $size)
    {
        $this->size = $size;
        parent::__construct($name, $price, $photo);
    }

    public function download() {
    echo "Скачивание электронного каталога '{$this->name}' объемом {$this->size} мегабайт";

    }
}

$item1 = new PhysicalProduct("Фонарь задний", 2000, "pic1.jpg", 2);
$item1->addToCart();
$item1->info();


$catalog = new DigitalProduct("Каталог запчастей КАМАЗ", 2500, "catalog.jpg", 40);
$catalog->download();
$catalog->info();
var_dump($catalog);

?>
<hr>
<a href="02.php">Второе задание</a>
