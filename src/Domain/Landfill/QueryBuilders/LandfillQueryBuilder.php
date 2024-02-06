<?php

namespace Domain\Landfill\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class LandfillQueryBuilder extends Builder
{

    public function activeItem($slug): LandfillQueryBuilder
    {
        return $this->public()
            ->where('slug', $slug)
            ->with([
                'category' => fn ($query) => $query
                    ->active()
                    ->select(['id','title','slug','thumbnail'])
            ])
            ->with([
                'city' => fn ($query) => $query
                    ->select(['id','title'])
            ])
            ->select(['address','slug','images','created_at','updated_at','landfill_category_id','city_id','coordinates']);
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
                    ->select(['id','title','slug','thumbnail'])
            ])
            ->with([
                'city' => fn ($query) => $query
                    ->select(['id','title'])
            ])
            ->when(request()->has('category'), function($query){
                $query->whereRelation('category','slug','=',request()->get('category'));
            })
            ->orderBy('created_at', 'desc')
            ->select(['address','slug','content','images','created_at','updated_at','landfill_category_id','city_id','coordinates']);
    }
}
