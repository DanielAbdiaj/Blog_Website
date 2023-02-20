<?php

class Database
{

    private $host = 'localhost';
    private $db = 'blogdatabase';
    private $user = 'root';
    private $password = '';
    private $connection;

    public function getConnection()
    {

        $this->connection = null;
        $dsn = "mysql:host={$this->host};dbname={$this->db}";

        try {
            $this->connection = new PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
                // ,PDO::ATTR_EMULATE_PRAPARES=>false,PDO::ATTR_STRINGIFY_FETCHES=>false
            );
        } catch (PDOException $e) {
            echo 'Connection Error:' . $e->getMessage();
        }
        return $this->connection;
    }
}
