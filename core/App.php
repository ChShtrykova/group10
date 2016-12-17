<?php

namespace core;

class App
{
    private static $app = [];


    public static function get($key)
    {
        return static::$app[$key];
    }


    public static function set($key, $value)
    {
        static::$app[$key] = $value;
    }
}