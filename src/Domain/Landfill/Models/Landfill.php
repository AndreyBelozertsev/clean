<?php

namespace Domain\Landfill\Models;

use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Domain\City\Models\City;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Domain\Landfill\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Landfill\QueryBuilders\LandfillQueryBuilder;

class Landfill extends Model
{
    use HasFactory, HasSlug, ScopeActive, HasSeo, CreateSeo;

    protected $fillable = [
        'slug',
        'content',
        'address',
        'name',
        'phone',
        'coordinates',
        'images',
        'city_id',
        'landfill_category_id',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'status' => StatusEnum::class
    ];

    protected $routeName = 'landfill.show';

    public function newEloquentBuilder($query): LandfillQueryBuilder 
    {
        return new LandfillQueryBuilder($query);
    }

    protected function slugFrom():string
    {
        return 'address';
    }

    protected function titleFrom():string
    {
        return 'address';
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


    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(LandfillCategory::class, 'landfill_category_id');
    }
}