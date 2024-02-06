<?php

namespace App\Observers;

use Domain\Article\Models\Article;
use Illuminate\Support\Facades\Cache;


class ArticleObserver
{ 
    /**
     * Handle the Article "saved" event.
     */
    public function saved(Article $article): void
    {
        Cache::forget('article_slider');
    }
 
 
    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        Cache::forget('article_slider');
    }
}
