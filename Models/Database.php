<?php

namespace Crawlers\Models;


use PDO;
use PDOException;

class Database implements DatabaseInterface
{
    private PDO $conn;

    /**
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     */



    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        $dsn = "mysql:host=$host;dbname=$dbname";
        try {
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    /**
     * @param string $table
     * @param array $data
     * @return bool|string
     */
    public function insert(string $table, array $data): bool|string
    {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($data);

        return $this->conn->lastInsertId();
    }
}
