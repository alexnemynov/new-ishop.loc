<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Необходима версия PHP >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';

new \aerohcss\App();

//var_dump(
//    \aerohcss\App::$app->getProperties()
//);