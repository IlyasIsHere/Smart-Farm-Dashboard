<?php

class DatabaseConnection {
    private static $instance;
    private $connection;

    // Private constructor to prevent instantiation
    private function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "smartFarm";

        // Create a database connection
        $this->connection = new mysqli($host, $username, $password, $database);

        // Check the connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Get the instance of the DatabaseConnection
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }

        return self::$instance;
    }

    // Get the database connection
    public function getConnection() {
        return $this->connection;
    }

    // Prevent cloning of the instance
    private function __clone() {}

    // Prevent unserialization of the instance
    public function __wakeup() {
        throw new Exception("Unserialization of DatabaseConnection instance is not allowed.");
    }
}

?>