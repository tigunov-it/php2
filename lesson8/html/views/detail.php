<h2>Детали заказа</h2>

<?php foreach ($order as $item):?>
    <div>
        <p> Наименование товара <?=$item['name'] ?></p>
        <p> Цена товара <?=$item['price']?> </p>
<!--        <button> <a href="/order/delete/?id=--><?//=$item['id'] ?><!--"> Удалить </a> </button>-->
<!--        <button> <a href="/basket/delete/?id=--><?//=$item['id'] ?><!--"> Удалить </a> </button><br>-->
    </div>

<?php endforeach; ?>