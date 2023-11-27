<?php

require('functions.php');

//dd($_SERVER);

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/web-app-php/') {
    require 'controllers/index.php';
}