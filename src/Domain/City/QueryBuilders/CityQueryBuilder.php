<?php

namespace Domain\City\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class CityQueryBuilder extends Builder
{


    public function activeItems(): CityQueryBuilder
    {
        return $this->active()
            ->orderBy('title', 'asc')
            ->select(['id','title','slug']);
    }

}
