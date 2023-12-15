<?php

use Core\Authenticator;
use Http\Forms\Login;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new Login();

if($form->validate($email, $password)) {

    if( (new Authenticator)->attempt($email, $password) ) {
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password.');
}

view('session/create.view.php', [
    'errors' => $form->errors()
]);