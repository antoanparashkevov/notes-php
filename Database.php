<?php

class Database
{

    public $connection;

    //this is called automatically by PHP when an instance is created
    public function __construct()
    {
        $config = [
            'host' => 'localhost',
            'port' => '3306',
            'dbname' => 'myblog',
            'charset' => 'utf8mb4'
        ];
        
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, 'username', 'password', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }

    public function query($query)
    {

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}