<?php

$config = require base_path('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$notes = $db->query('select * from notes where user_id = 1;')->findAll();

// dd($notes);

view('notes/index.view.php', [
    'header' => 'Notes',
    'notes' => $notes
]);