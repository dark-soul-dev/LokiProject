<?php

namespace Model;

class User
{

    public function __construct(int $id = 0, string $username = '', string $password = '')
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setUsername(string $username) { $this->username = $username; }
    public function getUsername() { return $this->username; }

    public function setPassword(string $password) { $this->password = $password; }
    public function getPassword() { return $this->password; }

}