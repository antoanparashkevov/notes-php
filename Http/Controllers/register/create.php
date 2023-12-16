<?php

use Core\Session;

view('register/create.view.php', [
    'heading' => 'Register',
    'errors' => Session::get('errors')
]);