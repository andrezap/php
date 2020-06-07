<?php

class DB
{
    private $connection = null;

    public function connect()
    {
        try {
            $dsn = "mysql:dbname=andrezadb; host=localhost";
            $user = 'andreza';
            $password = 'andreza';

            $this->connection = new PDO($dsn, $user, $password);

        } catch (Exception $exception) {
            echo 'Not connected';
        }

    }

    public function getConnection()
    {
        if($this->connection === null) {
            $this->connect();
        }

        return $this->connection;
    }

    public function close()
    {

    }
}