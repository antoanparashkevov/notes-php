<?php

namespace Core;

//We've built the container inside bootstrap.php. The purpose of this class is make it possible to access that container from anywhere in the application
class App
{
    protected static $container;

    public static function setContainer($container): void {
        static::$container = $container;
    }

    //getter method that gets the value stored in the $container
    public static function container() {
        return static::$container;
    }

    public static function bind($key, $resolver): void {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key) {
        return static::container()->resolve($key);
    }
}