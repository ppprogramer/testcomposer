<?php

namespace App\Models;

/**
 * Article Model
 */
class Article extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'wy_article';
    protected $fillable = ['title', 'content'];
}