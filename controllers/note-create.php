<?php

$currentUserId = 1;
$errors = [];
$page = "Create a Note";

$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

//dd($_SERVER);

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    if(strlen($_POST['body']) === 0) {
        $errors['body'] = 'A body is required';
    }

    if(empty($errors)) {

        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',[
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require('views/note-create.view.php');