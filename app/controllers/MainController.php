<?php

namespace app\controllers;

use aerohcss\Controller;

/** @property Main $model */
class MainController extends Controller
{
    public function indexAction()
    {
        $names = $this->model->getNames();
        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(compact('names'));
    }
}
