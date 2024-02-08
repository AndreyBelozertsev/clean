<?php

namespace Domain\Meeting\Models;

use Domain\Seo\Models\Seo;
use Support\Traits\HasSeo;
use Support\Traits\HasSlug;
use Domain\City\Models\City;
use Support\Traits\CreateSeo;
use Support\Traits\ScopeActive;
use Domain\Volunteer\Models\Volunteer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Domain\Meeting\QueryBuilders\MeetingQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meeting extends Model
{
    use HasFactory, HasSlug, ScopeActive, HasSeo, CreateSeo;

    protected $fillable = [
        'title',
        'slug',
        'scores',
        'content',
        'address',
        'thumbnail',
        'name',
        'phone',
        'coordinates',
        'city_id',
        'status',
        'start_at',
    ];

    protected $routeName = 'meeting.show';

    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Получить время до начала.
     *
     * @return string
     */
    public function getRemainsUntilAttribute():array | null
    {
        if(strtotime(date("Y-m-d h:i:s", time())) > strtotime($this->start_at)){
            return null;
        }
        $diff = abs(strtotime($this->start_at) - strtotime(date("Y-m-d H:i:s", time()))); 

        $data = [];
        $data['years']   = floor($diff / (365*60*60*24)); 
        $data['months']  = floor(($diff - $data['years'] * 365*60*60*24) / (30*60*60*24)); 
        $data['days']    = floor(($diff - $data['years'] * 365*60*60*24 - $data['months']*30*60*60*24)/ (60*60*24));
        $data['hours']   = floor(($diff - $data['years'] * 365*60*60*24 - $data['months']*30*60*60*24 - $data['days']*60*60*24)/ (60*60)); 
        $data['minuts']  = floor(($diff - $data['years'] * 365*60*60*24 - $data['months']*30*60*60*24 - $data['days']*60*60*24 - $data['hours']*60*60)/ 60); 
        $data['seconds'] = floor(($diff - $data['years'] * 365*60*60*24 - $data['months']*30*60*60*24 - $data['days']*60*60*24 - $data['hours']*60*60 - $data['minuts']*60)); 
 
        return $data;
    }

    public function newEloquentBuilder($query): MeetingQueryBuilder 
    {
        return new MeetingQueryBuilder($query);
    }

    protected function slugFrom():string
    {
        return 'title';
    }

    protected function titleFrom():string
    {
        return 'title';
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


    public function volunteers(): BelongsToMany
    {
        return $this->belongsToMany(Volunteer::class);
    }
}
