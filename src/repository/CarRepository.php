<?php


require_once 'Repository.php';
require_once __DIR__ . '/../models/Car.php';

class CarRepository extends Repository
{

    public function getCar(int $id): ?Car
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM car WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $car = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($car == false) {
            return null;
        }

        return new Car(
            $car['name'],
            $car['type'],
            $car['price'],
            $car['available'],
            $car['photo_url']
        );
    }

    public function addCar(Car $car): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO cars (name, type, price, available, photo_url)
            VALUES (?, ?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        $assignedById = 1;

        $stmt->execute([
            $car->getName(),
            $car->getType(),
            $car->getPrice(),
            $car->getAvailable(),
            $car->getPhoto()
        ]);
    }

    public function getCars(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cars;
        ');
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cars as $car) {
            $result[] = new Car(
                $car['name'],
                $car['type'],
                $car['cost'],
                $car['available'],
                $car['photo_url']
            );
        }
        return $result;
    }

    public function unavailableFrom(string $name): ?string
    {
        $stmt = $this->database->connect()->prepare('
        SELECT MIN(r.from_date) AS earliest_from_date
        FROM reservations r
        JOIN cars c ON r.car_id = c.id
        WHERE c.name = :name');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['earliest_from_date'])) {
            $earliestFromDate = new DateTime($result['earliest_from_date']);
            $date = $earliestFromDate->format('Y-m-d H:i:s');
            return $date;
        }

        return null;
    }

    public function unavailableTo(string $name): ?string
    {
        $stmt = $this->database->connect()->prepare('
        SELECT MAX(r.to_date) AS last_date
        FROM reservations r
        JOIN cars c ON r.car_id = c.id
        WHERE c.name = :name');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['last_date'])) {
            $d = new DateTime($result['last_date']);
            $date = $d->format('Y-m-d H:i:s');
            return $date;
        }

        return null;
    }
}