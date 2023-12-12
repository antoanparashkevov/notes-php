<?php

use Core\Database;

$currentUserId = 1;

$config = require base_path('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

//delete the particular note from the database
$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();

authorize($note && $note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
die();