<?php

$currentUserId = 1;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();

authorize($note && $note['user_id'] === $currentUserId);

// dd($note);

view('notes/show.view.php', [
    'heading' => 'Individual Note',
    'note' => $note
]);