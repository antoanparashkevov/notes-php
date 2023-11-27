<?php

require('functions.php');

//dd($_SERVER);

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/') {
    require 'controllers/index.php';
} else if ($uri === '/hero') {
    require 'controllers/hero.php';
}