<?php

class Database
{

    public $connection;
    public $statement;

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

        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findAll() {
        return $this->statement->fetchAll();
    }

    public function findOrFail() {
        $data = $this->find();

        if( !$data ) {
            abort();
        }

        return $data;
    }
}