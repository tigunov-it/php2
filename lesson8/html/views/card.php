<h2>Карточка товара</h2>

<div>
    <h3><?=$product->name?></h3>
    <p><?=$product->description?></p>
    <p>price: <?=$product->price?></p>
    <button> <a href="/basket/add/?id=<?= $product->id ?>"> Купить </a> </button>
</div>