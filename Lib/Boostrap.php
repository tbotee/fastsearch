<?php

include_once 'Controllers/HomeController.php';

class Boostrap
{

    public $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function render()
    {
        include 'Views/_Layout.php';
    }

    public function renderTitle()
    {
        echo "Title";
    }

    public function renderBody()
    {
        $homeController = new HomeController($this->config);
        $homeController->render();
    }
}