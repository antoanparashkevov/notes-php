<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class Login
{
    protected $errors = [];

    //a new way for declaring a variables inside the arguments list of a method
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

        return $instance->hasErrors() ? $instance->throw() : $instance;//we cannot return this since we ARE NOT in the object's context

    }

    public function throw(): ValidationException
    {
        //$this->errors() returns all form errors
        //$this->attributes() returns the old input fields
        ValidationException::throw($this->errors(), $this->attributes);
    }


    public function hasErrors(): bool
    {
        return count($this->errors);//returns a boolean that indicates whether the validation failed
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message): Login
    {
        $this->errors[$field] = $message;

        return $this;//we can return this since we ARE in the object's context
    }
}