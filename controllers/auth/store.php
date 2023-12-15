<?php

use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if( !Validator::email($email) ) {
    $errors['email'] = 'Please provide a valid email address!';
}

//255 is a common max for var char type in the db
if( !Validator::string($password, 3, 255) ) {
    $errors['password'] = 'Your password should be non-empty with at least 3 characters!';
}

if( !empty($errors) ) {
    view('auth/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve('Core\Database');

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->findAll();

if( $user ) {

    $_SESSION['has_logged_in'] = true;
    $_SESSION['user'] = array(
        'email' => $email
    );

    header('location: /');
    die();
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    $_SESSION['has_logged_in'] = true;
    $_SESSION['user'] = array(
        'email' => $email
    );

    header('location: /');
    die();
}