<?php

namespace App\Controllers;

use App\Services\View\View;

class HomeController 
{
   
    public function index() 
    {
        View::load('index');
    }
}