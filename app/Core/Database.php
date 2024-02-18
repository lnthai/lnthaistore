<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance;
    private $conn;

    private function __construct()
    {
        try {
            $host = getenv('DB_HOST');
            $dbname = getenv('DB_DATABASE');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');

            $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}