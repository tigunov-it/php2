<?php

namespace app\engine;

use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{

    public function renderTemplate($template, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('./templates');
        $twig = new \Twig\Environment($loader);

        echo "Отработал twig render";

        return $twig->render('index.twig', $params);
    }
}