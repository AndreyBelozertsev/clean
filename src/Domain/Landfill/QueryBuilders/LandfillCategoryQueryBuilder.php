<?php

namespace Domain\Landfill\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Domain\Landfill\QueryBuilders\LandfillQueryBuilder;

class LandfillCategoryQueryBuilder extends Builder
{


    public function activeNoEmptyItems(): LandfillCategoryQueryBuilder
    {
        return $this->active()
            ->whereHas('landfills', function($q){
                $q->public();
            })
            ->orderBy('sort', 'desc')
            ->select(['title','slug','thumbnail']);
    }

    public function landfillsCountGroupByCategory($slug = null): LandfillCategoryQueryBuilder
    {
        return $this->active()
            ->when($slug, function ($q) use($slug) {
                $q->where('slug', $slug);
            })
            ->withCount(['landfills' => function (LandfillQueryBuilder $query) {
                $query->public();
            }]);
    }


}
