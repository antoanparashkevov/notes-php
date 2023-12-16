<?php

namespace Core;

//inherits behavior that comes from its parent class (Exception)
class ValidationException extends \Exception
{
    protected array $errors = [];
    protected array $old = [];

    public static function throw($errors, $old)
    {
        $instance = new ValidationException();//since this method is a static method, we do not have access to $this

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