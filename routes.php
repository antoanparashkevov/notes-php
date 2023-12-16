<?php

$router->get('/', 'index.php');

//show all notes
$router->get('/notes', 'notes/index.php')->only('auth');

//show an individual note
$router->get('/note', 'notes/show.php')->only('auth');

//delete an individual note
$router->delete('/note', 'notes/destroy.php')->only('auth');

//create an individual note
$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');

//edit an individual note
$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');

//register
$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php')->only('guest');

//login
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');

//logout
$router->delete('/session', 'session/destroy.php')->only('auth');
