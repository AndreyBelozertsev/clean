<?php

namespace Domain\Meeting\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class MeetingQueryBuilder extends Builder
{

    public function activeItems(): MeetingQueryBuilder
    {
        return $this->active()
            ->select(['title','slug','content','coordinates', 'start_at' ]);
    }

    public function activeItem($slug): MeetingQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['title','slug','content','description', 'template']);
    }

    public function nearestEvent(): MeetingQueryBuilder
    {
        return $this->active()
            ->where('start_at', '>', now())->orderBy('start_at','asc')
            ->select(['slug','start_at']);
    }
}
