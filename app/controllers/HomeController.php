<?php

namespace App\Controller;
use Interop\Container\ContainerInterface;

class HomeController
{
    public function idex()
    {
        return template('home.html');
    }
}