<?php

namespace aerohcss;

trait TSingleton
{
    private static ?self $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): static
    {
        return static::$instance ??= new static();
    }
}
