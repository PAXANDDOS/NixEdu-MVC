<?php

namespace Framework;

class DB
{
    public static function connect(): \PDO
    {
        try {
            $connection = new \PDO(DB_CONNECTION . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . '\n';
        }
    }
}
