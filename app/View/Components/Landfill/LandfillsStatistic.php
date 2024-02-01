<?php

namespace App\View\Components\Landfill;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Domain\Landfill\Models\Landfill;
use Illuminate\Support\Facades\Cache;
use Domain\Landfill\Models\LandfillCategory;

class LandfillsStatistic extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landfill.landfills-statistic',['landfill_statistic' => $this->getData()]);
    }

    protected function getData()
    {
        return Cache::rememberForever('landfill_category_statistic', function () {
            return LandfillCategory::landfillsCountGroupByCategory()->get();
        });
    }
}
