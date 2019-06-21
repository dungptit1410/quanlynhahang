<?php

class DB
{
    private static $conn = NULL;
    public static function getInstance() {
        if (!isset(self::$conn)) {
            try {
                $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );
                self::$conn = new PDO('mysql:host=localhost;dbname=quanlynhahang', 'root', '',$options);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conn;
    }
}