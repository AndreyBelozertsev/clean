<?php
namespace App\View\Components\Volunteer;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Domain\Volunteer\Models\Volunteer;

class VolunteersList extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.volunteer.volunteers-list',['volunteers' => $this->getData()]);
    }

    protected function getData(): Collection
    {
        return Volunteer::activeItems()
            ->limit(3)
            ->withSum('meetings','scores')
            ->orderBy('meetings_sum_scores', 'desc')
            ->get();
    }
}
