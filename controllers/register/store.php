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
if( !Validator::string($password, 3, 255) ) {
    $errors['password'] = 'Your password should be non-empty with at least 3 characters!';
}

if( !empty($errors) ) {
    view('register/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

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
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);

    header('location: /');
    die();
}