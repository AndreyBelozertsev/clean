<?php
namespace Domain\Article\Models;

use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Support\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Domain\Article\QueryBuilders\ArticleQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, HasSlug, ScopeActive, HasSeo, CreateSeo, HasThumbnail;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'description',
        'thumbnail',
    ];


    protected $routeName = 'article.show';

    protected $casts = [
        'images' => 'array'
    ];

    public function newEloquentBuilder($query): ArticleQueryBuilder 
    {
        return new ArticleQueryBuilder($query);
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

    protected function thumbnailDir():string
    {
        return 'article';
    }
}
