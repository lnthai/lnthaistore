<?php

namespace App\Models;

use App\Interface\ModelInterface;
use App\Core\Database;
use PDO;

class BaseModel implements ModelInterface
{
    protected $conn;
    
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function insert($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $values = ':' . implode(',:', array_keys($data));

        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        $stmt = $this->conn->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function update($table, $data, $cond, $condValue)
    {
        $updateString = '';

        foreach ($data as $key => $value) {
            $updateString .= "$key=:$key,";
        }

        $updateString = rtrim($updateString, ',');

        $query = "UPDATE $table SET $updateString WHERE $cond = :condValue";
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(":condValue", $condValue);

        return $stmt->execute();
    }

    public function delete($table, $cond, $condValue)
    {
        $query = "DELETE FROM $table WHERE $cond = :condValue";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":condValue", $condValue);

        return $stmt->execute();
    }

    public function getAll($table)
    {
        $query = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($table, $cond, $condValue)
    {
        $query = "SELECT * FROM $table WHERE $cond = :condValue LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':condValue', $condValue);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

  
}
