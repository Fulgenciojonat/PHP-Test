<?php

namespace TestProject\Utils;

use TestProject\Class\Interfaces\DBClient;

class MySqlDB implements DBClient
{
    private \PDO $pdo;

    private function __construct()
    {
        $dsn = 'mysql:dbname=phptest;host=127.0.0.1';
        $user = 'root';
        $password = 'pass';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function create(): DBClient
    {
        return new self();
    }

    public function select(string $sql): array
    {
        $sth = $this->pdo->query($sql);
        return $sth->fetchAll();
    }

    public function execute(string $sql, array $params): int
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    public function lastInsertId(): string
    {
        return $this->pdo->lastInsertId();
    }
}