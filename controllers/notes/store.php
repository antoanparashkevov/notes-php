<?php

use Core\Validator;
use Core\App;

$currentUserId = 1;
$errors = [];

$db = App::container()->resolve('Core\Database');

if(!Validator::string($_POST['body'], 1, 20)) {
    $errors['body'] = 'A body of no more than 1100 characters is required!';
}

if(!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => 'Create A Note',
        'errors' => $errors
    ]);

} else {

    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',[
        'body' => $_POST['body'],
        'user_id' => 1
    ]);

    header('location: /notes');
    die();
}