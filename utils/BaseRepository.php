<?php

declare(strict_types=1);

namespace TestProject\Utils;

use TestProject\Class\Interfaces\DBClient;

abstract class BaseRepository
{
    protected DBClient $db;
    protected string $table;

    public function __construct(DBClient $db, string $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    /**
     * Lists all records from the table.
     *
     * @return array The list of records.
     */
    public function list(): array
    {
        $sql = "SELECT * FROM `{$this->table}`";
        return $this->db->select($sql);
    }

    /**
     * Saves a record to the table.
     *
     * If an ID is provided, the record will be updated. Otherwise, a new record will be inserted.
     *
     * @param array $data The data to save.
     * @return int The ID of the saved record.
     */
    public function save(array $data): int
    {
        if (isset($data['id'])) {
            // Update existing record
            $fields = array_map(fn($key) => "`$key` = ?", array_keys($data));
            $sql = "UPDATE `{$this->table}` SET " . implode(', ', $fields) . " WHERE `id` = ?";
            $params = array_values($data);
            $params[] = $data['id'];
        } else {
            // Insert new record
            $fields = array_keys($data);
            $placeholders = array_fill(0, count($fields), '?');
            $sql = "INSERT INTO `{$this->table}` (`" . implode('`, `', $fields) . "`) VALUES (" . implode(', ', $placeholders) . ")";
            $params = array_values($data);
        }

        $this->db->execute($sql, $params);

        return isset($data['id']) ? $data['id'] : (int)$this->db->lastInsertId();
    }

    /**
     * Deletes a record from the table.
     *
     * @param string $id The ID of the record to delete.
     * @return int The number of affected rows.
     */
    public function delete(string $id): int
    {
        $sql = "DELETE FROM `{$this->table}` WHERE `id` = ?";
        return $this->db->execute($sql, [$id]);
    }
}