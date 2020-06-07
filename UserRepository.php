<?php

require 'DB.php';
require 'User.php';

class UserRepository
{
    private $db = null;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function save($name, $email) : ?User
    {
        try {
            $connection = $this->db->getConnection();
            $query = 'INSERT INTO users(name, email) VALUES (:name, :email)';
            $statement = $connection->prepare($query);

            $statement->execute([
                'name' => $name,
                'email' => $email
            ]);

            return new User($name, $email);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        return null;
    }

    public function listAll()
    {

    }
}