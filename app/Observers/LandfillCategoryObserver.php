<?php

namespace App\Observers;

use App\LandfillCategory;
use Illuminate\Support\Facades\Cache;

class LandfillCategoryObserver
{
        /**
     * Handle the LandfillCategory "saved" event.
     */
    public function saved(LandfillCategory $landfillCategory): void
    {
        Cache::forget('landfill_category_statistic');
        Cache::forget('landfills_map_list');
        Cache::forget('landfill_category_active_no_empty');
    }
 
 
    /**
     * Handle the LandfillCategory "deleted" event.
     */
    public function deleted(LandfillCategory $landfillCategory): void
    {
        Cache::forget('landfill_category_statistic');
        Cache::forget('landfills_map_list');
        Cache::forget('landfill_category_active_no_empty');
    }
}
