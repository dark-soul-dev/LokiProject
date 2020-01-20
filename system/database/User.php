<?php

namespace Database;

use Database\DB;
use IvanFilho\Database\Column;
use IvanFilho\Database\Table;
use IvanFilho\Database\Utils;
use Model\User as Obj;

class User extends Table
{

    public function __construct()
    {
        $db = (DB::getInstance())->getPDO();
        $cols = array(
            new Column('id', INT, 0, false, 'AUTO_INCREMENT', 'PRIMARY KEY'),
            new Column('username', VARCHAR, 10, false),
            new Column('password', VARCHAR, 32, false)
        );

        parent::__construct($db, 'users', $cols, 'Model\User');
    }

    public function getByUsername(string $username)
    {
        $where[] = Utils::createConditionFromValue($this, 'username', $username);
        return parent::read(array(), $where);
    }
}