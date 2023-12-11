<?php

class Validator
{
    public function isEmpty($value) {
        return strlen($value) === 0;
    }
}