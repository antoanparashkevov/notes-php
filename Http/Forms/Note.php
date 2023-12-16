<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class Note
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($this->attributes['body'], 5, 100)) {
            $this->errors['body'] = 'Please provide a note body that has at least 5 characters and maximum 100 characters!';
        }
    }

    public static function validate($attributes): ValidationException | Note
    {
        $instance = new Note($attributes);

        return $instance->hasErrors() ? $instance->throw() : $instance;
    }

    public function throw(): ValidationException
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function hasErrors(): bool
    {
        return count($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($field, $message): Note
    {
        $this->errors[$field] = $message;

        return $this;//we can return this since we ARE in the object's context
    }

}