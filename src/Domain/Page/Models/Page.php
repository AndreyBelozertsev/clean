<?php
namespace Domain\Page\Models;


use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Domain\Page\QueryBuilders\PageQueryBuilder;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Page extends Model
{
    use HasFactory, HasSlug, ScopeActive, HasSeo, CreateSeo;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'sort',
        'status',
    ];

    protected $routeName = 'page.show';

    public function newEloquentBuilder($query): PageQueryBuilder 
    {
        return new PageQueryBuilder($query);
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
        return 'slug';
    }
}
