<?php

namespace SlamMicro\Sharedmodels;

use PDO;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Capsule\Manager as Capsule;


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

    public function getModels(string $table, string $modelClass): Collection
    {
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $this->host,
            'port' => $this->port,
            'database' => $this->database,
            'username' => $this->username,
            'password' => $this->password,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        $capsule->bootEloquent();
        $models = $modelClass::query()->from($table)->get();
        return $models;
    }
}
