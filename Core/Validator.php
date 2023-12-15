<?php

namespace Core;

class Validator
{
    //pure function -> make them static
    public static function string($value, $min = 1, $max = INF) {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}