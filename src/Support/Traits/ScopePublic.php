<?php

namespace Support\Traits;

trait ScopePublic
{
    public function scopePublic($query)
    {
        return $query->where('status','public');
    }
}