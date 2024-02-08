<?php

namespace Domain\Question\Models;

use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Question\QueryBuilders\QuestionQueryBuilder;

class Question extends Model
{
    use HasFactory, HasSlug, ScopeActive, HasSeo, CreateSeo;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'thumbnail',
    ];

    protected $casts = [
        'images' => 'array'
    ];

    protected $routeName = 'question.show';

    public function newEloquentBuilder($query): QuestionQueryBuilder 
    {
        return new QuestionQueryBuilder($query);
    }


    protected function makeUrl($slug = null):string
    {
        if(!$slug){
            $slug = $this->slug;
        }

        return route($this->routeName, ['slug' => $slug] );
    }

    public function seo(): MorphOne
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
