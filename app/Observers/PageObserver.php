<?php

namespace App\Observers;


use Domain\Page\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageObserver
{

    /**
     * Handle the Navigation "saved" event.
     */
    public function saved(Page $page): void
    {
        Cache::forget('page_' . $page->slug);
    }
 
 
    /**
     * Handle the Navigation "deleted" event.
     */
    public function deleted(Page $page): void
    {
        Cache::forget('page_' . $page->slug);
    }
}
