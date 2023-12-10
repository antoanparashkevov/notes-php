<?php

$currentUserId = 1;
$page = "Note";

$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->fetch();

if ( !$note ) {
    abort();
}

if( $note && $note['user_id'] !== $currentUserId ) {
    abort(Response::FORBIDDEN);
}

// dd($note);

require 'views/note.view.php';