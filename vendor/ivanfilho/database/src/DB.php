<?php

namespace IvanFilho\Database;

use \PDO;

define("COMMA", ", ");
define("AND_A", " AND ");
define("BQ", "`"); #Backquote
define("QT", "'"); #Single Quote
define("CL", ":"); #Colon

abstract class DB
{

    private static function connection()
    {
        $pdo = null;

        try {
            $pdo = new PDO('mysql:dbname=' .DB_NAME .';host=' .DB_HOST, DB_USER, DB_PASS);
            if (defined('DEBUG') && DEBUG) {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch(PDOException $e) {
            die($e->getMessage());
        }

        return $pdo;
    }

    private static function prepareStatement($db, $query, $bindings)
    {
        if (empty($bindings)) {
            return false;
        }

        $sttm = $db->prepare($query);
        foreach ($bindings as $key => $value) {
            $sttm->bindValue($key+1, $value);
        }
        $sttm->execute();
        return $sttm;
    }

    public static function migrate(Blueprint $table)
    {
        $fields = Utils::getFieldsFromColumnArray($table->columns);
        self::connection()->query('CREATE TABLE IF NOT EXISTS '.BQ.$table->name.BQ." ($fields)");
    }

    public static function rollback(string $tableName)
    {
        self::connection()->query('DROP TABLE IF EXISTS '.BQ.$tableName.BQ);
    }

    public static function select(string $query, array $bindings = [], $asList = true)
    {
        $db = self::connection();
        $sttm = self::prepareStatement($db, $query, $bindings);
        $sql = $sttm !== false ? $sttm : $db->query($query);

        if (! $sql) return false;

        $fetch = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $asList || empty($fetch) ? $fetch : $fetch[0];
    }

    public static function selectOne(string $query, array $bindings = [])
    {
        return self::select($query, $bindings, false);
    }

    public static function insert(string $query, array $bindings = [])
    {
        $db = self::connection();
        
        self::prepareStatement($db, $query, $bindings);
        return $db->lastInsertId();
    }
}