<?php

namespace app\controllers;

use app\models\Products;

class ProductController extends Controller
{

    public function actionIndex() {
//        echo "Главная";
        echo $this->render('index');
    }

    public function actionBasket() {
        echo $this->render('basket');
    }

    public function actionCatalog() {
//        echo "catalog";
        $catalog = Products::getALL();
        echo $this->render('catalog', [
            'catalog' => $catalog
        ]);
    }

    public function actionCard() {
//        echo "card";
        $id = $_GET['id'];
        $product = Products::getOne($id);
        echo $this->render('card', [
            'product' => $product
        ]);
    }

}