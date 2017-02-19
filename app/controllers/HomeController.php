<?php

namespace App\Controllers;

use Services\Mail;
use Services\OAuth;
use Services\Redis;
use Services\View;
use App\Models\Article;

class HomeController extends BaseController
{
    public $data;

    public function index()
    {
        $article = Article::findOrFail(1);
        $this->view = View::make('index')->with('article', $article);
    }

    public function mail()
    {
        $this->mail = Mail::to(['1026039774@qq.com'])
            ->from('18279409761@163.com')
            ->title('Fuck Me!')
            ->content('<h1>Hello~~</h1>');
    }

    public function redis()
    {
        Redis::set('key', 'value', 5, 's');
        echo Redis::get('key');
    }

    public function oauth()
    {
        $code = $_GET['code'];
        $info = new OAuth($code, 'post');
        var_dump($info->getInfo());
    }

    public function third()
    {
        $this->view = View::make('oauth');
    }
}