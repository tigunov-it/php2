<?php

namespace app\controllers;

use app\models\Orders;

class AdminController extends Controller
{
    public function actionIndex() {
        if ($_SESSION['login'] == 'admin') {
            $orders = Orders::getALL();
            echo $this->render('admin', [
                'orders' => $orders]);
        } else
        header('Location: /');
        die();
    }

}