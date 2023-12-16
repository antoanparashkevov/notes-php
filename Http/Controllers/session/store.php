<?php

use Core\Authenticator;
use Http\Forms\Auth;

$form = Auth::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signIn = (new Authenticator)->loginAttempt(
    $attributes['email'], $attributes['password']
);

if ( !$signIn ) {
    $form->error('email', 'Incorrect email or password!')
        ->throw();
}

redirect('/');