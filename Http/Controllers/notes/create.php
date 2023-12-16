<?php

use Core\Session;

view('notes/create.view.php', [
    'heading' => 'Create A Note',
    'errors' => Session::get('errors')
]);