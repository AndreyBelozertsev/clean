<?php

namespace Domain\Landfill\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class LandfillQueryBuilder extends Builder
{

    public function activeItem($slug): LandfillQueryBuilder
    {
        return $this->public()
            ->where('slug', $slug)
            ->select(['address','slug','content', 'coordinates']);
    }

    public function activeItems(): LandfillQueryBuilder
    {
        return $this->public()
            ->whereHas('category', function($q){
                $q->active();
            })
            ->with([
                'category' => fn ($query) => $query
                    ->active()
                    ->select(['id','title','slug'])
            ])
            ->with([
                'city' => fn ($query) => $query
                    ->select(['id','title'])
            ])
            ->orderBy('created_at', 'asc')
            ->select(['address','slug','images','created_at','landfill_category_id','city_id','coordinates']);
    }

    public function public(): LandfillQueryBuilder
    {
        return $this->where('status', 'public');
    }
}
