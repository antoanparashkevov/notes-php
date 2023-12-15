<?php

use Core\Validator;
use Core\App;
use Http\Forms\Login;

$db = App::resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];

$form = new Login();

if(! $form->validate($email, $password)) {
    view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if( $user ) {

    if(password_verify($password, $user['password'])) {
        login($user);

        header('location: /');
        die();
    }
}

view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);
