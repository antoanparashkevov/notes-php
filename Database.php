<?php

class Database
{

    public $connection;

    //this is called automatically by PHP when an instance is created
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;post=3306;dbname=myblog;charset=utf8mb4';
        $this->connection = new PDO($dsn, 'username', 'password');

    }

    public function query($query)
    {

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}