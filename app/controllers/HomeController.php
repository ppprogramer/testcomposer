<?php

namespace App\Controllers;

use Services\View;
use App\Models\Article;

class HomeController extends BaseController
{

    public function index()
    {
        $article = Article::findOrFail(1);
        $this->view = View::make('index')->with('article', $article);
    }
}