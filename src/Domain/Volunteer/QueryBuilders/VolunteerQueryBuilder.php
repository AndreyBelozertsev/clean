<?php

namespace Domain\Volunteer\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class VolunteerQueryBuilder extends Builder
{

    public function activeItems(): VolunteerQueryBuilder
    {
        return $this->public()
            ->select(['id','name','slug','thumbnail','content']);
    }


    public function activeItem($slug): VolunteerQueryBuilder
    {
        return $this->public()
            ->where('slug', $slug)
            ->select(['name','slug','thumbnail','content']);
    }
}
