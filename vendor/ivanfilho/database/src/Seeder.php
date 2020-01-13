<?php

namespace IvanFilho\Database;

class Seeder
{

    public function __construct()
    {}

    public function call(String $className)
    {
        if (! class_exists($className)) return false;
        (new $className())->run();
    }

}