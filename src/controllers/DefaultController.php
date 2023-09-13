<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function login(){
        $this->render('login');
    }

    public function booking(){
        $this->render('booking');
    }

    public function addCar(){
        $this->render('addCar');
    }
}