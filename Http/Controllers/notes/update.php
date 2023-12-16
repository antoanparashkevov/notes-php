<?php

use Core\App;
use Core\Session;
use Http\Forms\Note;

$form = Note::validate($attributes = [
    'body' => $_POST['body']
]);

$db = App::resolve('Core\Database');

//TODO create a separate class to handle this in case of error (something like Authenticator.php)
$oldItem = $db->query('SELECT * FROM notes WHERE id = :id', [
   'id' => $_POST['id']
])->find();

if($oldItem) {

    $db->query('update notes set body = :body where id = :id',[
        'body' => $attributes['body'],
        'id' => $_POST['id']
    ]);

    redirect('/notes');
}

