<?php

namespace app\controllers;

class BasketController extends Controller
{
    public function actionIndex() {
        $basket = [];
        echo $this->render('basket' , [
            'basket' => $basket
        ]);
    }
}