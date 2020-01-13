<?php

namespace IvanFilho\Database;

use \PDO;
use \App\Seeds;

abstract class Schema
{

    public static function create(string $table, \Closure $callback)
    {
        $className = ucfirst(substr($table, 0, strlen($table) -1));
        echo 'Schema::create()' .'<br>';
        echo 'table: ' .$table .'<br>';

        $blueprint = new Blueprint($table);
        $callback($blueprint);

        DB::migrate($blueprint);

        (new Seeds())->run();
    }

    public static function drop(string $table)
    {
        DB::rollback($table);
    }
}