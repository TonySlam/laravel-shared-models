<?php

namespace SlamMicro\Sharedmodels;

use PDO;

class LinkModels
{
    public static function connect($host = '127.0.0.1', $port = '3306', $database, $username, $password = null)
    {
        $dsn = "mysql:host={$host};port={$port};dbname={$database}";
        $pdo = new PDO($dsn, $username, $password);
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
