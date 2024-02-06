<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\Article\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::activeItems()->paginate(24);
        return view('page.article.index',['articles' => $articles]);
    }

    public function show($slug)
    {
        $article = Article::activeItem($slug)->firstOrFail();
        return view('page.article.show',['article' => $article]);
    }
}
