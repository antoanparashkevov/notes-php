<?php

use Core\App;

$db = App::resolve('Core\Database');

$note = $db->query('SELECT * FROM notes WHERE id=:id', [
    'id' => $_GET['id']
])->find();

view('notes/show.view.php', [
    'heading' => 'Individual Note',
    'note' => $note
]);