<?php

$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$note = $db->query('select * from notes where id=:id', ['id' => $_GET['id']])->fetch();

// dd($note);

$page = "Note";

require 'views/note.view.php';