<?php

$currentUserId = 1;
$page = "Note";

$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->findOrFail();


authorize($note && $note['user_id'] === $currentUserId);

// dd($note);

require 'views/notes/show.view.php';