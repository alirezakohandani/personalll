<?php

namespace App\Controllers;

use App\Services\View\View;

class ArticleController 
{
    /**
     * List of articles
     *
     * @return void
     */
    public function index()
    {
        View::load('article');
    }
}