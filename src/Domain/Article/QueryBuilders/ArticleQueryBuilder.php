<?php

namespace Domain\Article\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class ArticleQueryBuilder extends Builder
{

    public function activeItem($slug): ArticleQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['title','slug','content','description', 'thumbnail']);
    }

    public function activeItems(): ArticleQueryBuilder
    {
        return $this->active()
            ->orderBy('created_at', 'asc')
            ->select(['title','slug','thumbnail','description','created_at']);
    }

}
