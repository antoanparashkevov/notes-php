<?php

$currentUserId = 1;
$errors = [];
$page = "Create a Note";

require('Validator.php');
$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

//dd($_SERVER);

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {


    if(!Validator::string($_POST['body'], 1, 20)) {
        $errors['body'] = 'A body of no more than 1100 characters is required!';
    }

    if(empty($errors)) {

        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',[
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require('views/note-create.view.php');