<?php

namespace aerohcss;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        // Чтобы ошибка не выводилась, а попадала в буфер
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }
    public function exceptionHandler(\Throwable $e)
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logError($message = '', $file = '', $line = '')
    {
        file_put_contents(
            LOGS . '/errors.log',
            "[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n===========\n",
            FILE_APPEND
        );
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        if ($response == 0) {
            $response = 404;
        }
        // отправить код ответа в заголовках
        http_response_code($response);
        if ($response == 404 && !DEBUG) {
            require_once WWW . '/errors/404.php';
            die;
        }
        if (DEBUG) {
            require_once WWW . '/errors/development.php';
        } else {
            require_once WWW . '/errors/production.php';
        }
        die;
    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->logError($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $$errfile, $errline);
    }

    function fatalErrorHandler()
    {
        // если была ошибка и она фатальна
        if ($error = error_get_last() and $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            // очищаем буффер (не выводим стандартное сообщение об ошибке)
            ob_end_clean();
            // запускаем обработчик ошибок
            $this->errorHandler($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            // отправка (вывод) буфера и его отключение
            ob_end_flush();
        }
    }
}
