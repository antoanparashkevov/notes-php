<?php

$router->get('/', 'controllers/index.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/auth', 'controllers/auth.php');
