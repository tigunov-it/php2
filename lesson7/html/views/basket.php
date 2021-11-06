<h2>Это корзина</h2>

<?php foreach ($basket as $item):?>

    <div>
        <h3> <?=$item['name']?> </h3>
        <p> Цена: <?=$item['description']?> </p>
        <p> Цена: <?=$item['price']?> </p>
        <button>Удалить</button>
        <button> <a href="/basket/delete/?id=<?=$item['id'] ?>"> Удалить </a> </button>
    </div>

<?php endforeach; ?>