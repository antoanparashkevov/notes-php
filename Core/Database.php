<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statement;

    //this is called automatically by PHP when an instance is created
    public function __construct($config, $username, $password)
    {

        //connection string to the database using mysql db engine
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        //creates an object instance of the PDO class
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }

    public function query($query, $params = []): Database
    {
        //prepare() returns a statement object, not the actual data
        $this->statement = $this->connection->prepare($query);

        //we should execute the prepared query using execute()
        $this->statement->execute($params);

        //make it possible to chain through the class methods
        return $this;
    }

    public function find()
    {
        //returns one match and no more
        return $this->statement->fetch();
    }

    public function findAll()
    {
        //always returns an associative array no matter how many items are found
        return $this->statement->fetchAll();
    }
}