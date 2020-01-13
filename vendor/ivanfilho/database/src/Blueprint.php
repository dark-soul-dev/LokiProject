<?php

namespace IvanFilho\Database;

use IvanFilho\Database\Column;

class Blueprint
{

    public function __construct($tableName)
    {
        $this->name = $tableName;
    }
    
    public function increments($columnName)
    {
        $this->columns[$columnName] = (new Column())
                                                        ->name($columnName)
                                                        ->type('INT')
                                                        ->key('PRIMARY KEY')
                                                        ->extra('AUTO_INCREMENT');
        return $this->columns[$columnName];
    }

    public function string($columnName)
    {
        $this->columns[$columnName] = (new Column())
                                                        ->name($columnName)
                                                        ->type('TEXT');
        return $this->columns[$columnName];
    }

}