<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('register', 'SecurityController');
Router::get('cars', 'CarController');
Router::post('getCars','CarController' );
Router::post('booking', 'BookingController');
Router::post('login', 'SecurityController');
Router::post('addCar', 'CarController');
Router::run($path);