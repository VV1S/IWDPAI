<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function login(){
        $this->render('login');
    }

    public function cars(){
        $this->render('cars');
    }

    public function booking(){
        $this->render('booking');
    }
}