<?php

use Core\Authenticator;
use Http\Forms\Login;

$form = Login::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if (!$signIn) {
    $form->error('email', 'Incorrect email or password!')
        ->throw();
}

redirect('/');