<?php

namespace Core;

class App
{
    protected static array $container;

    public static function setContainer($container): void {
        static::$container = $container;
    }

    public static function container(): array {
        return static::$container;
    }

    public static function bind($key, $resolver): void {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key) {
        return static::container()->resolve($key);
    }
}