<?php

namespace app\controllers;
use app\engine\Request;
use app\models\Basket;
use app\models\Orders;

class OrderController extends Controller
{
    public function actionOrder() {
//        echo 'Отработал Ордер контроллер';
        $email = (new Request())->getParams()['email'];
        $session_id = session_id();
        (new Orders($session_id, $email))->save();
        echo 'Спасибо! Мы свяжемся с вами в ближайшее время, чтобы обсудить детали заказа.';
    }

    public function actionDetail() {
        echo 'Детали заказа';
        $session_id = (new Request())->getParams()['id'];
        $order = Basket::getBasket($session_id);
        var_dump($order);
        echo $this->render('detail', [
            'order' => $order
        ]);
    }

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $order = Orders::getOneWhere('id', $id);
        $order->delete();
        header('Location: /admin');
        die();
    }
}