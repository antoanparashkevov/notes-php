<?php

use Core\Validator;
use Core\App;

$db = App::resolve('Core\Database');

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if( !Validator::email($email) ) {
    $errors['email'] = 'Please provide a valid email address!';
}

//255 is a common max for var char type in the db
if( !Validator::string($password) ) {
    $errors['password'] = 'Please provide a valid password';
}

if( !empty($errors) ) {
    view('session/create.view.php', [
        'errors' => $errors
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
