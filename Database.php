<?php

class Database
{

    public $connection;

    //this is called automatically by PHP when an instance is created
    public function __construct($config, $username, $password)
    {
        
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }

    public function query($query, $params = [])
    {

        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}