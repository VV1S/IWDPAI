<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('login', 'DefaultController');
Router::get('cars', 'DefaultController');
Router::get('booking', 'DefaultController');
Router::run($path);