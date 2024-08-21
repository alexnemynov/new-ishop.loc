<?php

namespace aerohcss;

abstract class Controller
{
    public array $data = [];
    public array $meta = [];
    public false|string $layout = '';  // шаблон
    public string $view = '';  // при желании можно переопределить вид
    public object $model;


    public function __construct(public $route = [])
    {
    }

    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }

    public function getView()
    {
        $this->view = $this->view ?: $this->route['action'];
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->data = [
            'title' => $title, 'description' => $description, 'keywords' => $keywords
        ];
    }
}
