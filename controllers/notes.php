<?php

$config = require('config.php');
$db = new Database($config['database'], $config['username'], $config['password']);

$notes = $db->query('select * from notes where user_id = 1;')->fetchAll();

// dd($notes);

$page = "Notes";

require 'views/notes.view.php';