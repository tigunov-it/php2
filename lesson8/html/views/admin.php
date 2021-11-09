<h3>Это админка</h3>

<?php foreach ($orders as $item):?>

    <div>
        <h3> Заказ номер <?=$item['id']?></h3>
        <p> email заказчика: <?=$item['email']?></p>
        <a href="/order/detail/?id=<?=$item['session_id'] ?>">Детали заказа</a><br>
        <a href="/order/delete/?id=<?=$item['id'] ?>">Удалить заказ</a><br>
    </div>

<?php endforeach; ?>
