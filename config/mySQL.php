<?php
class MySQL
{
    public static function getDB()
    {
        try {
        $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
        $conn = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

        } catch(PDOException $e) {
            return 'ERROR: ' . $e->getMessage();
        }
    }

    
}