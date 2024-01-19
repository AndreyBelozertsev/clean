<?php

namespace Domain\Page\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class PageQueryBuilder extends Builder
{

    public function activeItem($slug): PageQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['title','slug','content','description', 'template']);
    }
}
