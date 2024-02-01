<?php

namespace App\Observers;

use Domain\City\Models\City;
use Illuminate\Support\Facades\Cache;



class CityObserver
{
    /**
     * Handle the City "saved" event.
     */
    public function saved(City $city): void
    {
        Cache::forget('city_active_list');
    }
 
 
    /**
     * Handle the City "deleted" event.
     */
    public function deleted(City $city): void
    {
        Cache::forget('city_active_list');
    }
}
