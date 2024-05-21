<?php
namespace TestProject\Class\Interfaces;

interface DBClient
{
    public static function create(): DBClient;

    public function execute(string $sql, array $params): int;
}