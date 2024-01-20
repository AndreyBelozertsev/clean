<?php

namespace Domain\Landfill\Models;

use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Landfill\QueryBuilders\LandfillCategoryQueryBuilder;

class LandfillCategory extends Model
{
    use HasFactory, ScopeActive, HasSlug;

    protected $fillable = [
        'title',
        'thumbnail',
        'slug',
        'sort',
        'status',
    ];

    public function newEloquentBuilder($query): LandfillCategoryQueryBuilder 
    {
        return new LandfillCategoryQueryBuilder($query);
    }

    public function landfills(): HasMany
    {
        return $this->hasMany(Landfill::class);
    }

}