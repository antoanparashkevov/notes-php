<?php

namespace Http\Forms;

use Core\Validator;

class Login
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address!';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message): void
    {
        $this->errors[$field] = $message;
    }
}