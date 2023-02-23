<?php

namespace SlamMicro\Sharedmodels;

use PDO;

class LinkModels
{
    private $host = 'localhost';
    private $port = '3306';


    public static function connect($host, $port, $database, $username, $password = null)
    {
        $dsn = "mysql:host={$host};port={$port};dbname={$database}";
        $pdo = new PDO($dsn, $username, $password);
        return $pdo;
    }

    public  function getModels()
    {
        $pdo = $this->connect();
        $stmt = $pdo->query('SELECT * FROM models');
        $models = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\\Model\\Model');
        return $models;
    }
}
