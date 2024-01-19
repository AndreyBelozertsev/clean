<?php

namespace Support\Traits;

trait ScopeActive
{
    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
}
