<?php

namespace Domain\Question\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class QuestionQueryBuilder extends Builder
{

    public function activeItem($slug): QuestionQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['title','slug','content','images', 'thumbnail']);
    }

    public function activeItems(): QuestionQueryBuilder
    {
        return $this->active()
            ->orderBy('created_at', 'desc')
            ->select(['title','slug','thumbnail','description','created_at']);
    }

}
