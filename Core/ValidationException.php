<?php

namespace Core;

//inherits behavior that comes from its parent class (Exception)
class ValidationException extends \Exception
{
    protected $errors = [];
    protected $old = [];

    public static function throw($errors, $old)
    {
        $instance = new ValidationException();

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;

    }

    public function errors()
    {
        return $this->errors;
    }

    public function old()
    {
        return $this->old;
    }
}