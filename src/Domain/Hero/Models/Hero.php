<?php

namespace Domain\Hero\Models;

use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Domain\Hero\QueryBuilders\HeroQueryBuilder;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hero extends Model
{
    use HasFactory, HasSlug, ScopeActive, HasSeo, CreateSeo;

    protected $routeName = 'hero.show';

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'content',
        'scores',
        'status',
    ];

    public function newEloquentBuilder($query): HeroQueryBuilder 
    {
        return new HeroQueryBuilder($query);
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

    protected function slugFrom():string
    {
        return 'name';
    }

    protected function titleFrom():string
    {
        return 'name';
    }
}
