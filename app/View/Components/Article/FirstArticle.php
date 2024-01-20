<?php

namespace App\View\Components\Article;

use Closure;
use Illuminate\View\Component;
use Domain\Article\Models\Article;
use Illuminate\Contracts\View\View;

class FirstArticle extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.first-article',['article' => $this->getData()]);
    }

    protected function getData(): Article | null
    {
        return Article::activeItems()->first();
    }
}
