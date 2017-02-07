<?php

namespace App\Controllers;

use App\Models\Article;

class HomeController extends BaseController
{

    public function index()
    {
        $article = Article::findOrFail(1);
        require dirname(__FILE__) . '/../../resource/views/index.php';
    }
}