<?php

namespace Domain\Question\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class QuestionQueryBuilder extends Builder
{

    public function activeItem($slug): QuestionQueryBuilder
    {
        return $this->active()
            ->where('slug', $slug)
            ->select(['title','slug','content','description', 'thumbnail']);
    }

    public function activeItems(): QuestionQueryBuilder
    {
        return $this->active()
            ->orderBy('created_at', 'asc')
            ->select(['title','slug','thumbnail','description','created_at']);
    }

}
