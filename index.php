<?php

require 'functions.php';
require 'routes.php';
require 'Database.php';

//connect to MySQL database;

$db = new Database();

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

//dd($posts);
