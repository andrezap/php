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

    public function save($name, $email): ?User
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

    public function listAll(): ?array
    {
        try {
            $connection = $this->db->getConnection();
            $query = 'SELECT * FROM users';
            $statement = $connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        return null;
    }

    public function exist(string $email): bool
    {
        try {
            $connection = $this->db->getConnection();
            $query = 'SELECT COUNT(*) as count FROM users WHERE email = :email';
            $statement = $connection->prepare($query);
            $statement->execute(
                [
                    'email' => $email
                ]
            );

            $result = $statement->fetch();

            return $result['count'] > 0;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        return true;
    }

    public function update(string $name, string $email): void
    {
        try {
            $connection = $this->db->getConnection();
            $query = 'UPDATE users SET name = :name WHERE email = :email';
            $statement = $connection->prepare($query);
            $statement->execute(
                [
                    'email' => $email,
                    'name' => $name
                ]
            );
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}