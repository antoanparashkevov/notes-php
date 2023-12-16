<?php

use Core\Session;
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

Session::flash('errors', $form->errors());

redirect('/session');

//view('session/create.view.php', [
//    'errors' => $form->errors()
//]);