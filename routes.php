<?php

$router->get('/', 'controllers/index.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->delete('/note', 'controllers/notes/destroy.php')->only('auth');

$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php')->only('auth');

$router->get('/register', 'controllers/register/create.php')->only('guest');
$router->post('/register', 'controllers/register/store.php')->only('guest');


$router->get('/login', 'controllers/login/create.php')->only('guest');
$router->post('/login', 'controllers/login/store.php')->only('guest');
