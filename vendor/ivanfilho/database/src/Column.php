<?php

namespace IvanFilho\Database;

/**
* Class: Column
* 
* Contain information for every column in a database table.
*
* @package      Database
* @subpackage   src
* @author       Ivan Filho <ivanfilho21@gmail.com>
*
* Created: Jul 22, 2019.
* Last Modified: Dez 9, 2019.
*/

class Column
{
    private $name = "";
    private $type = ""; # Name of the type. Ex: INT
    private $length = 0;
    private $columnType = ""; # Name of the type plus the length. Ex: VARCHAR(200)
    private $nullable = false;
    private $extra = "";
    private $key = "";
    private $value = "";

    /* public function __construct($name, $dataType, $length=0, $nullable=true, $extra="", $key="", $value="")
    {
        $this->name($name);
        $this->type($dataType);
        $this->length($length);
        $this->nullable($nullable);
        $this->extra($extra);
        $this->key($key);
        $this->setValue($value);
    } */

    public function getColumnInformation()
    {
        $info = "";
        $info .= BQ .$this->getName() .BQ ." " .$this->getColumnType();

        if (! empty($this->getNullable()))
            $info .= " " .$this->getNullable();

        if (! empty($this->getExtra()))
            $info .= " " .$this->getExtra();

        if (! empty($this->getKey()))
            $info .= " " .$this->getKey();

        return $info;
    }

    # Column Type

    private function createColumnType()
    {
        $colType = $this->getType();
        $colType .= $this->getLength() > 0 ? '(' .$this->getLength() .')' : '';
        $this->columnType($colType);
    }

    # Getters and Setters

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function type($type)
    {
        $this->type = $type;
        $this->createColumnType();
        return $this;
    }

    public function length($length)
    {
        $this->length = $length;
        $this->createColumnType();
        return $this;
    }

    public function columnType($columnType)
    {
        $this->columnType = $columnType;
        return $this;
    }

    public function nullable($nullable = true)
    {
        $this->nullable = $nullable;
        return $this;
    }

    public function extra($extra)
    {
        $this->extra = $extra;
        return $this;
    }

    public function key($key)
    {
        $this->key = $key;
        return $this;
    }

    public function value($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getColumnType()
    {
        return $this->columnType;
    }

    public function getNullable()
    {
        return $this->nullable;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getExtra()
    {
        return $this->extra;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}