<?php

use Core\App;
use Core\Session;
use Http\Forms\Note;

$form = Note::validate($attributes = [
    'body' => $_POST['body']
]);

$db = App::resolve('Core\Database');

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)',[
    'body' => $attributes['body'],
    'user_id' => Session::get('user')['id']
]);

redirect('/notes');
