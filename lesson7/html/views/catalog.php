<h2>Каталог</h2>

<?php foreach ($catalog as $item):?>

    <div>
        <h3> <a href="/product/card/?id=<?=$item['id'] ?>"> <?=$item['name']?> </a> </h3>
        <p> Цена: <?=$item['price']?> </p>
        <button> <a href="/basket/add/?id=<?=$item['id'] ?>"> Купить </a> </button>
    </div>

<?php endforeach; ?>
