<?php

namespace Controller;

use Database\User as TableUser;
use Model\User;

class Authentication extends Controller
{

    private $table;

    public function __construct()
    {
        $this->table = new TableUser();
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $this->authenticate();
        $this->title = 'Entrar';
        $this->loadView('login');
    }

    public function register()
    {
        $this->title = 'Registro';
        $this->loadView('register');
    }

    public function authenticate()
    {
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $un = !empty($post['username']) ? $post['username'] : '';
        $pw = !empty($post['password']) ? $post['password'] : '';

        $this->data['un'] = $un;
        $this->data['pw'] = $pw;

        $user = $this->table->getByUsername($un);
        echo '<pre>' . var_export($user, true) . '</pre>';
    }

}