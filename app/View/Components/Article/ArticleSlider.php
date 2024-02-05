<?php

namespace App\View\Components\Article;

use Closure;
use Illuminate\View\Component;
use Domain\Article\Models\Article;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class ArticleSlider extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.article-slider',['articles' => $this->getData()]);
    }

    protected function getData(): Collection
    {
        return Cache::rememberForever('article_slider', function () {
            return Article::activeItems()->limit(4)->oldest()->get();
        });
    }
}
