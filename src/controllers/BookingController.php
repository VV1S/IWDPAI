<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/Repository.php';
require_once __DIR__ . '/../models/Car.php';
require_once __DIR__.'/../repository/BookingRepository.php';

class BookingController extends AppController {


    private $message = [];
    private $bookingRepository;
    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->bookingRepository = new BookingRepository();
        $this->repository = new Repository();
    }

    public function booking()
    {
        if (!$this->isPost()) {
            return $this->render('booking');
        }

        $car_name = $_POST['car_name'];
        self::setCarId($this->bookingRepository->getID($car_name));
        $baseCost = $this->bookingRepository->getCost($car_name);

        $client_id = self::getUserId();
        $car_id = self::getCarId();
//        $client_id = $_POST['client_id'];
//        $car_id = $_POST['car_id'];
        $from_date = $_POST['date'];
        $to_date_temp = new DateTime($from_date);
        $hours = $_POST['hours'];
        $days = $_POST['days'];
        $to_date_temp->add(new DateInterval("P{$days}DT{$hours}H"));
        $to_date = $to_date_temp->format('Y-m-d H:i:s');
        $cost =  $baseCost * ($_POST['days'] + $_POST['hours']/24);


        //TODO try to use better hash function
        $booking = new Booking($client_id, $car_id, $from_date, $to_date, $cost);

        $this->bookingRepository->addBooking($booking);

        return $this->render('login', ['messages' => ['A new redervation was added!']]);
    }
}