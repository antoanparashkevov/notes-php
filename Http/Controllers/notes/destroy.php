<?php

use Core\App;

$db = App::resolve('Core\Database');

//delete the particular note from the database
$note = $db->query('SELECT * FROM notes WHERE id=:id', [
    'id' => $_GET['id']
])->find();

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

redirect('/notes');