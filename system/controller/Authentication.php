<?php

namespace Controller;

class Authentication extends Controller
{

    public function __construct()
    {}

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $this->title = 'Entrar';
        $this->loadView('login');
    }

    public function register()
    {}
}