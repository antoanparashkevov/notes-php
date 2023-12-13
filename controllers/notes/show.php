<?php

use Core\App;

$currentUserId = 1;

$db = App::container()->resolve('Core\Database');

$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();
authorize($note && $note['user_id'] === $currentUserId);

// dd($note);

view('notes/show.view.php', [
    'heading' => 'Individual Note',
    'note' => $note
]);