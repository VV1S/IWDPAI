<?php


class Booking
{
    private $client_id;
    private $car_id;
    private $from_date;
    private $to_Date;
    private $cost;


    public function __construct($client_id, $car_id, $from_date, $to_Date, $cost)
    {
        $this->client_id = $client_id;
        $this->car_id = $car_id;
        $this->from_date = $from_date;
        $this->to_Date = $to_Date;
        $this->cost = $cost;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientId($client_id): void
    {
        $this->client_id = $client_id;
    }

    public function getCarId()
    {
        return $this->car_id;
    }

    public function setCarId($car_id): void
    {
        $this->car_id = $car_id;
    }

    public function getFromDate()
    {
        return $this->from_date;
    }

    public function setFromDate($from_date): void
    {
        $this->from_date = $from_date;
    }

    public function getToDate()
    {
        return $this->to_Date;
    }

    public function setToDate($to_Date): void
    {
        $this->to_Date = $to_Date;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost): void
    {
        $this->cost = $cost;
    }
}