<?php

namespace App\Db;

use PDO;
use PDOException;
use PDOStatement;
use App\Traits\Helpers;
use App\Enums\Dbconfig;

class Db
{
    use Helpers;

    private static $instance = null;
    private $connection;
    private PDOStatement $stmt;

    public function __construct(){}
    public function __clone(){}
    public function __wakeup(){}

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
            self::$instance->connection();
        }
        return self::$instance;
    }

    public function connection(): void
    {
        $config = Dbconfig::getConfig();
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8";
        
        try {
            $this->connection = new PDO($dsn, $config['user'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            throw new \RuntimeException("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        if ($this->connection === null) {
            $this->connection();
        }
        return $this->connection;
    }

    public function query($query, array $params = []): static
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function findAll(): array
    {
        return $this->stmt->fetchAll();
    }

    public function find(): mixed
    {
        return $this->stmt->fetch();
    }

    public function findOrFaile()
    {
        $res = $this->find();
        empty($res) ? $this->error(404) : $res;
        return $res;
    }
}