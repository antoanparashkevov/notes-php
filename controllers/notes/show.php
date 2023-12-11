<?php

use Core\Database;

$currentUserId = 1;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //delete the particular note from the database
    $note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();

    authorize($note && $note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
       'id' => $_POST['id']
    ]);

    header('location: /notes');
    die();

} else {
    $note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();

    authorize($note && $note['user_id'] === $currentUserId);
}

// dd($note);

view('notes/show.view.php', [
    'heading' => 'Individual Note',
    'note' => $note
]);