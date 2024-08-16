<?php

namespace aerohcss;

class Router
{
    protected static array $routes = [];
    protected static array $route = [];

    public static function add($regexp, $route = []): void
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            echo 'Ok';
        } else {
            echo 'NO';
        }
    }

    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['admin_prefix'])) {
                    $route['admin_prefix'] = '';
                } else {
                    // Это нужно для пространства имен
                    $route['admin_prefix'] = '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                $route['action'] = self::lowerCamelCase($route['action']);
                debug($route);
                return true;
            }
        }
        return false;
    }

    //CamelCase
    protected static function upperCamelCase($name): string
    {
        // new-product => new product
        $name = str_replace('-', ' ', $name);
        // new product => New Product
        $name = ucwords($name);
        // New Product = > NewProduct
        $name = str_replace(' ', '', $name);
        return $name;
    }

    //camelCase
    protected static function lowerCamelCase($name): string
    {
        // NewProduct = > newProduct
        $name = lcfirst(self::upperCamelCase($name));
        return $name;
    }
}
