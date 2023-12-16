<?php

use Core\App;

$db = App::resolve('Core\Database');

//TODO create a separate class to handle this in case of error (something like Authenticator.php)
$note = $db->query('SELECT * FROM notes WHERE id=:id', [
    'id' => $_GET['id']
])->find();

view('notes/edit.view.php', [
    'heading' => 'Edit A Note',
    'note' => $note
]);



