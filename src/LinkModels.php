<?php

namespace SlamMicro\Sharedmodels;

use PDO;

class LinkModels
{
    private $host;
    private $port;
    private $database;
    private $username;
    private $password;

    public function __construct($host, $port, $database, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database}";
        $pdo = new PDO($dsn, $this->username, $this->password);
        return $pdo;
    }

    public function getModels(string $table, string $modelClass)
    {
        $pdo = $this->connect();
        $stmt = $pdo->query("SELECT * FROM $table");
        $models = $stmt->fetchAll(PDO::FETCH_CLASS, $modelClass);
        return $models;
    }
}
