<?php

use Core\App;
use Core\Session;

$db = App::resolve('Core\Database');

//TODO create a separate class to handle this in case of error (something like Authenticator.php)
$notes = $db->query('select * from notes where user_id = :user_id',[
    'user_id' => Session::get('user')['id']
])->findAll();

view('notes/index.view.php', [
    'header' => 'Notes',
    'notes' => $notes
]);