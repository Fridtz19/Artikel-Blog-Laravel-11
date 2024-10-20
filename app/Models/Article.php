<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'is_published'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = str()->slug($article->title);
        });
    }
}
