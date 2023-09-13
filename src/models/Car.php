<?php

require_once __DIR__ . '/../repository/CarRepository.php';

class Car {
    private $name;
    private $type;
    private $price;
    private $available;
    private $photo_url;


    public function __construct($name, $type, $price, $available, $photo_url)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->available = $available;
        $this->photo_url = $photo_url;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getAvailable()
    {
        return $this->available;
    }

    public function setAvailable($available)
    {
        $this->available = $available;
    }

    public function getPhoto()
    {
        return $this->photo_url;
    }

    public function setPhoto($photo_url)
    {
        $this->photo_url = $photo_url;
    }

    public function getUnavailableTimeFrom(string $a)
    {
        $carRepository = new CarRepository();
        return $carRepository->unavailableFrom($a);
    }

    public function getUnavailableTimeTo(string $a)
    {
        $carRepository = new CarRepository();
        return $carRepository->unavailableTo($this->getName());
    }
}