<?php

namespace Domain\Hero\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class HeroQueryBuilder extends Builder
{

    public function activeItems(): HeroQueryBuilder
    {
        return $this->active()
            ->orderBy('created_at', 'desc')
            ->select(['name','slug','thumbnail','content']);
    }


    public function activeItem($slug): HeroQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['name','slug','thumbnail','content']);
    }
}
