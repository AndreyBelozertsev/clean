<?php

namespace App\View\Components\Meeting;

use Closure;
use Illuminate\View\Component;
use Domain\Meeting\Models\Meeting;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class MeetingNext extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meeting.meeting-next',['meeting' => $this->getData() ]);
    }


    protected function getData(): Meeting | null
    {
        $meeting = Cache::rememberForever('meeting_next', 
            fn () => Meeting::nearestEvent()->first() );


        if($meeting){
            ($meeting->start_at < date('Y-m-d H:i:s') ) ? Cache::forget('meeting_next') : ''; 
        }

        return $meeting;
    }
}
