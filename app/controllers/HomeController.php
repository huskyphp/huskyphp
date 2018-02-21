<?php

namespace App\Controller;
use App\Model\User;
class HomeController
{
    public function index()
    {
        $user= json_encode(User::all());
        return $user;
    }
}