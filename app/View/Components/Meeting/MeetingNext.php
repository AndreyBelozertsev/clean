<?php

namespace App\View\Components\Meeting;

use Closure;
use Illuminate\View\Component;
use Domain\Meeting\Models\Meeting;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

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
        return Meeting::nearestEvent()->first();
    }
}
