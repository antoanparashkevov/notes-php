<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class Login
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        //when we instantiate the Login class, we immediately instantiate any of the attributes that are relevant
        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address!';
        }

        if (!Validator::string($this->attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password';
        }
    }

    public static function validate($attributes): ValidationException | Login
    {
        $instance = new Login($attributes);//instantiate the class and the validation starts

        return $instance->hasErrors() ? $instance->throw() : $instance;

    }

    public function throw(): ValidationException
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }


    public function hasErrors(): bool
    {
        return count($this->errors);//returns a boolean that indicates whether the validation failed
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message): Login
    {
        $this->errors[$field] = $message;

        return $this;
    }
}