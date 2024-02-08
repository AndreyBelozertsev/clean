<?php

namespace Domain\Meeting\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class MeetingQueryBuilder extends Builder
{

    public function activeItems(): MeetingQueryBuilder
    {
        return $this->active()
            ->orderBy('start_at', 'desc')
            ->with([
                'city' => fn ($query) => $query
                    ->select(['id','title'])
            ])
            ->select(['title','address','slug','content','coordinates', 'start_at', 'city_id']);
    }

    public function activeItem($slug): MeetingQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['title','address','slug','content', 'images','coordinates', 'start_at', 'city_id', 'name', 'phone']);
    }

    public function nearestEvent(): MeetingQueryBuilder
    {
        return $this->active()
            ->where('start_at', '>', now())->orderBy('start_at','asc')
            ->with([
                'city' => fn ($query) => $query
                    ->select(['id','title'])
            ])
            ->select(['id','slug','start_at','address','city_id']);
    }
}
