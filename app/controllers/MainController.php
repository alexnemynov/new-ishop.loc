<?php

namespace app\controllers;

use aerohcss\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(['test' => 'TEST VAR', 'name' => 'aerohcss']);
    }
}
