<?php

namespace App\Observers;

use Domain\Setting\Models\Navigation;
use Illuminate\Support\Facades\Cache;


class NavigationObserver
{
    /**
     * Handle the Navigation "saved" event.
     */
    public function saved(Navigation $navigation): void
    {
        Cache::forget('navigation_menu');
    }
 
 
    /**
     * Handle the Navigation "deleted" event.
     */
    public function deleted(Navigation $navigation): void
    {
        Cache::forget('navigation_menu');
    }
}
