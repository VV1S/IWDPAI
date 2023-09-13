<?php


require_once 'Repository.php';
require_once __DIR__ . '/../models/Booking.php';

class BookingRepository extends Repository
{
    public function addBooking(Booking $booking): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO reservations (client_id, car_id, from_date, to_date, cost)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $booking->getClientId(),
            $booking->getCarId(),
            $booking->getFromDate(),
            $booking->getToDate(),
            $booking->getCost()
        ]);
    }

    public function getID(string $name): ?int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cars WHERE name = :name        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['id'];
    }

    public function getCost(string $name): ?float
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cars WHERE name = :name        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['cost'];
    }

    public function makeUnavailable(string $name)
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE cars SET available = false WHERE name = :name');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
    }


}