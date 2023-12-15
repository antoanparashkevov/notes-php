<?php

use Core\App;

$db = App::resolve('Core\Database');

$notes = $db->query('select * from notes where user_id = 1;')->findAll();

// dd($notes);

view('notes/index.view.php', [
    'header' => 'Notes',
    'notes' => $notes
]);