<?php

use Http\Forms\Auth;
use Core\Authenticator;

$form = Auth::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signup = (new Authenticator)->registerAttempt(
    $attributes['email'], $attributes['password']
);

if( !$signup ) {
    $form->error('email', 'There is already created account with the given email address! Provide a different one!')
        ->throw();
}

redirect('/');