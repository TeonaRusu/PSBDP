<?php

namespace Mini\Controller;

class HomeController
{
    public function index()
    {
        $page = 'home';
        $title = 'Hotel management';

        require APP . 'view/_templates/header.php';
        require APP . 'view/_templates/footer.php';
    }
}
