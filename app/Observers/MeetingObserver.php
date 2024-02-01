<?php

namespace App\Observers;

use Domain\Meeting\Models\Meeting;


class MeetingObserver
{
    /**
     * Handle the Meeting "saved" event.
     */
    public function saved(Meeting $meeting): void
    {
        Cache::forget('meeting_next');
        Cache::forget('meetings_map_list');
    }
 
 
    /**
     * Handle the Meeting "deleted" event.
     */
    public function deleted(Meeting $meeting): void
    {
        Cache::forget('meeting_next');
        Cache::forget('meetings_map_list');
    }
}
