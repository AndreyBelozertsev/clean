<?php

namespace App\Observers;


use Illuminate\Support\Facades\Cache;
use Domain\Landfill\Models\LandfillCategory;

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
        Cache::forget('landfills_list_home_page');
    }
 
 
    /**
     * Handle the LandfillCategory "deleted" event.
     */
    public function deleted(LandfillCategory $landfillCategory): void
    {
        Cache::forget('landfill_category_statistic');
        Cache::forget('landfills_map_list');
        Cache::forget('landfill_category_active_no_empty');
        Cache::forget('landfills_list_home_page');
    }
}
