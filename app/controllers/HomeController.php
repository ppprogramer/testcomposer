<?php

namespace App\Controllers;

use Services\Mail;
use Services\View;
use App\Models\Article;

class HomeController extends BaseController
{

    public function index()
    {
        $article = Article::findOrFail(1);
        $this->view = View::make('index')->with('article', $article);
    }

    public function sendMail()
    {
        $this->mail = Mail::to(['1026039774@qq.com'])
            ->from('18279409761@163.com')
            ->title('Fuck Me!')
            ->content('<h1>Hello~~</h1>');
    }
}