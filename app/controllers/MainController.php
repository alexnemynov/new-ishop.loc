<?php

namespace app\controllers;

use aerohcss\Controller;
use RedBeanPHP\R;

/** @property Main $model */
class MainController extends Controller
{
    public function indexAction()
    {
        $names = $this->model->getNames();
        $one_name = R::getRow('select * FROM name WHERE id=2');
        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(compact('names'));
    }
}
