<?php
namespace Domain\City\Models;



use Support\Traits\HasSlug;
use Support\Traits\ScopeActive;
use Domain\Meeting\Models\Meeting;
use Domain\Landfill\Models\Landfill;
use Domain\Volunteer\Models\Volunteer;
use Illuminate\Database\Eloquent\Model;
use Domain\City\QueryBuilders\CityQueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, HasSlug, ScopeActive;

    protected $fillable = [
        'title',
        'slug',
        'sort',
    ];

    public function landfills(): HasMany
    {
        return $this->hasMany(Landfill::class);
    }


    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }

    public function volunteers(): HasMany
    {
        return $this->hasMany(Volunteer::class);
    }

    public function newEloquentBuilder($query): CityQueryBuilder 
    {
        return new CityQueryBuilder($query);
    }

}
