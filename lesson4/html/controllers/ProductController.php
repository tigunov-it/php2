<?php

namespace app\controllers;

use app\models\Products;

class ProductController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action) {
        $this->action = $action ?? $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        }

    }

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

    public function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }

    }

    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = "./views/" . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}