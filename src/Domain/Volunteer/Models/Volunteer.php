<?php

namespace Domain\Volunteer\Models;

use App\Enums\StatusEnum;
use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Domain\City\Models\City;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Support\Traits\ScopePublic;
use Domain\Meeting\Models\Meeting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Volunteer\QueryBuilders\VolunteerQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Volunteer extends Model
{
    use HasFactory, HasSlug, ScopePublic, HasSeo, CreateSeo;

    protected $routeName = 'volunteer.show';

    protected $fillable = [
        'name',
        'slug',
        'phone',
        'thumbnail',
        'content',
        'city_id',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function newEloquentBuilder($query): VolunteerQueryBuilder 
    {
        return new VolunteerQueryBuilder($query);
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


    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany(Meeting::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
