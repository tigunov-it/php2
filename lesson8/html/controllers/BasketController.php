<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        $session_id = session_id();
        $basket = Basket::getBasket($session_id);
        echo $this->render('basket' , [
            'basket' => $basket
        ]);
    }

    public function actionAdd() {
//        $id = $_GET['id'];
        $id = (new Request())->getParams()['id'];
        $session_id = session_id();

        (new Basket($id, $session_id))->save();

        header('Location: /product/catalog');
        die();
    }

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $session_id = session_id();
        $basket = new Basket($id, $session_id); // создаем сущность с данными
        $basket->deleteFromBasket();
        header('Location: /basket');
        die();
        }

//    public function actionRemove() {
//        $id = $_GET['id'];
//        $session_id = session_id();
//        var_dump($session_id);
//        die();
//    }

}