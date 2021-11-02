<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
//        $basket = [];
        $basket = Basket::getAll();
        var_dump($basket);
        echo $this->render('basket' , [
            'basket' => $basket
        ]);
    }
}