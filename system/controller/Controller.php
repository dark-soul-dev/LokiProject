<?php

namespace Controller;

abstract class Controller
{

    public function __construct()
    {}

    public abstract function index();

    protected function loadView(string $view)
    {
        $ext = $this->getExtension($view);
        include REQUIRE_PATH .'template/top.php';
        include REQUIRE_PATH ."pages/$view.$ext";
        include REQUIRE_PATH .'template/bottom.php';
    }

    private function getExtension($view)
    {
        $file = REQUIRE_PATH ."pages/$view";
        $extensions = array('php', 'html');
        foreach ($extensions as $ext) {
            if (file_exists("$file.$ext")) return $ext;
        }
    }
}