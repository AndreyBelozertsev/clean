<?php

namespace App\Observers;

use App\Page;

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
