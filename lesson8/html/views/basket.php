<h2>Это корзина</h2>

<?php foreach ($basket as $item):?>

    <div>
        <h3> <?=$item['name']?> </h3>
        <p> Цена: <?=$item['description']?> </p>
        <p> Цена: <?=$item['price']?> </p>
        <button> <a href="/basket/delete/?id=<?=$item['id'] ?>"> Удалить </a> </button><br>
    </div>

<?php endforeach; ?>

<form action="/order/order/" method="post">
    <input type="text" name="email" placeholder="email">
    <input type="submit" name="submit" value="Оформить заказ">
</form>
