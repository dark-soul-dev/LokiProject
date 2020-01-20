<?php

namespace Database;

use PDO;
use PDOException;

class DB
{

    public static $instance = null;
    private $pdo;

    public static function getInstance()
    {
        if (self::$instance === null) {
            return new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $dbName = 'torrent_db';
        $dbHost = '127.0.0.1';
        $dbUser = 'php';
        $dbPass = '';

        try {
            $this->pdo = new PDO("mysql:dbname=$dbName;host=$dbHost", $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
    
}