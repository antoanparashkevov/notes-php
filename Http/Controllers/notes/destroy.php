<?php

use Core\App;

$currentUserId = 1;

$db = App::resolve('Core\Database');

//delete the particular note from the database
$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->find();

authorize($note && $note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
die();