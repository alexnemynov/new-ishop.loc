<?php

// Режим работы - dev или prod
define("DEBUG", 1);
// Определяем корневой каталог как родительский к текущему
define("ROOT", dirname(__DIR__));
// Путь к публичной папке
define("WWW", ROOT . '/public');
// Путь к папке приложения
define("APP", ROOT . '/app');
// Путь к ядру приложения
define("CORE", ROOT . '/vendor/aerohcss');
// Помошники в ядре (необязательно, для удобства)
define("HELPERS", ROOT . '/vendor/aerohcss/helpers');
// Кэш
define("CACHE", ROOT . '/tmp/cache');
// Логи
define("LOGS", ROOT . '/tmp/logs');
// Конфиг
define("СONFIG", __DIR__);
// Шаблон сайта по умолчанию
define("LAYOUT", 'ishop');
// HTTP адрес сайта
define("PATH", 'http://new-ishop.loc');
// Путь к админке
define("ADMIN", 'http://new-ishop.loc/admin');
// Картинка по умолчанию
define("NO_IMAGE", 'uploads/no_image.jpg');

require_once ROOT . '/vendor/autoload.php';


