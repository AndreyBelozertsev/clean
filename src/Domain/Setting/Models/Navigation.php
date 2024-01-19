<?php

namespace Domain\Setting\Models;


use Support\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Setting\QueryBuilders\NavigationQueryBuilder;

class Navigation extends Model
{
    use HasFactory, ScopeActive;

    public function child()
    {
        return $this->hasMany(self::class);
    }

    public function newEloquentBuilder($query): NavigationQueryBuilder 
    {
         return new NavigationQueryBuilder($query);
    }
}
