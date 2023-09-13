<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function getID(string $email): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email        ');
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['id'];
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, surname, email, password)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword()
        ]);

//        $stmt = $this->database->connect()->prepare('
//            INSERT INTO users (email, password, id_user_details)
//            VALUES (?, ?, ?)
//        ');
//
//        $stmt->execute([
//            $user->getEmail(),
//            $user->getPassword(),
//            $this->getUserDetailsId($user)
//        ]);
    }
}