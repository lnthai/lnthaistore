<?php

namespace App\Controllers;

use App\Views\Views;

class BaseController
{
    // public function __construct()
    // {
    //     echo 'Controller';
    // }
    public function model($model)
    {
        require_once './app/Models/' . $model . '.php';
    }
    public function view($view, $data = array())
    {
        require_once './app/Views/' . $view . '.php';
    }
    public function login($login)
    {
        require_once './app/Views/auth/' . $login . '.php';
    }
}
