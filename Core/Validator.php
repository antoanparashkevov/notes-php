<?php

namespace Core;

class Validator
{
    //pure function -> make it static
    public static function string($value, $min = 1, $max = INF): bool {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    //pure function -> make it static
    public static function email(string $value): bool {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}