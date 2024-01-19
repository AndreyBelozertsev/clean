<?php

namespace Domain\Seo\Models;

use App\Casts\SeoUrlCast;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Domain\Seo\QueryBuilders\SeoQueryBuilder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'description'
    ];

    protected $casts = [
        'url' => SeoUrlCast::class
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function (Seo $model) {
            Cache::forget('seo_' . str($model->url)->slug('_'));
        });

        static::updated(function (Seo $model) {
            Cache::forget('seo_' . str($model->url)->slug('_'));
        });

        static::deleted(function (Seo $model) {
            Cache::forget('seo_' . str($model->url)->slug('_'));
        });
    }

    /**
    * Get the parent seoable model.
    */
    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }

    public function newEloquentBuilder($query): SeoQueryBuilder 
    {
        return new SeoQueryBuilder($query);
    }

}
