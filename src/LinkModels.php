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

    /**
     * @return PDO
     */
    public function connect()
    {
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database}";
        $pdo = new PDO($dsn, $this->username, $this->password);
        return $pdo;
    }

    /**
     * @param string $table
     * @param string $modelClass
     * @return Collection
     */
    public function getModels(string $table, string $modelClass): Collection
    {
        $pdo = $this->connect();
        $connection = new Illuminate\Database\Connection($pdo);
        $resolver = new Illuminate\Database\ConnectionResolver(['default' => $connection]);
        $builder = new Illuminate\Database\Eloquent\Builder($resolver, new $modelClass);
        $models = $builder->from($table)->get();
        return $models;
    }
}
