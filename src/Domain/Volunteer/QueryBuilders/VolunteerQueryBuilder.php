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
            ->with([
                'city' => fn ($query) => $query
                    ->select(['id','title'])
            ])
            ->with([
                'meetings' => fn ($query) => $query
                    ->select(['title','slug', 'start_at','coordinates'])
            ])
            ->select(['id','name','slug','thumbnail','content', 'city_id']);
    }
}
