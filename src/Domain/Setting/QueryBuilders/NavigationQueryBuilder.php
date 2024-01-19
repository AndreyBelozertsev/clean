<?php
namespace Domain\Setting\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class NavigationQueryBuilder extends Builder
{
    public function activeItems(): NavigationQueryBuilder
    {
        return $this->where('status', 1)->orderBy('sort');
    }
}