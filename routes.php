<?php

$router->get('/', 'controllers/index.php');
$router->get('/auth', 'controllers/auth.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
