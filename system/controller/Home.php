<?php

namespace Controller;

class Home extends Controller
{

    public function __construct()
    {
        $this->title = 'Início';
    }

    public function index()
    {
        $this->loadView('home');
    }
}