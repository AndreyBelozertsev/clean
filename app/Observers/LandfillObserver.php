<?php

namespace App\Observers;

use Domain\Landfill\Models\Landfill;
use Illuminate\Support\Facades\Cache;


class LandfillObserver
{

    /**
     * Handle the Landfill "saved" event.
     */
    public function saved(Landfill $landfill): void
    {
        Cache::forget('landfill_category_statistic');
        Cache::forget('landfills_map_list');
        Cache::forget('landfill_category_active_no_empty');
    }
 
 
    /**
     * Handle the Landfill "deleted" event.
     */
    public function deleted(Landfill $landfill): void
    {
        Cache::forget('landfill_category_statistic');
        Cache::forget('landfills_map_list');
        Cache::forget('landfill_category_active_no_empty');
    }
}
