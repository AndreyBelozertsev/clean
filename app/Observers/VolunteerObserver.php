<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use Domain\Volunteer\Models\Volunteer;


class VolunteerObserver
{
    /**
     * Handle the Volunteer "saved" event.
     */
    public function saved(Volunteer $volunteer): void
    {
        Cache::forget('volunteer_top_list');
    }
 
 
    /**
     * Handle the Volunteer "deleted" event.
     */
    public function deleted(Volunteer $volunteer): void
    {
        Cache::forget('volunteer_top_list');
    }
}
