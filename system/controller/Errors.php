<?php

namespace Controller;

class Errors extends Controller
{

    public function __construct()
    {}

    public function index()
    {
        $this->title = 'Erro 404 - Página não Encontrada';
        $this->loadView('404');
    }
}