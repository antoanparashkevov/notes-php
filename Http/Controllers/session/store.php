<?php

use Core\Session;
use Core\Authenticator;
use Core\ValidationException;
use Http\Forms\Login;

$email = $_POST['email'];
$password = $_POST['password'];

$form = Login::validate([
    'email' => $email,
    'password' => $password
]);

$signIn = (new Authenticator)->attempt(
    $email, $password
);

if (!$signIn) {
    $form->error('email', 'No matching account found for that email address and password.')
        ->throw();
}

redirect('/');