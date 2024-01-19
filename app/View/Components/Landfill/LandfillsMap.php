<?php

namespace App\View\Components\Landfill;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Domain\Landfill\Models\Landfill;
use Domain\Landfill\Models\LandfillCategory;

class LandfillsMap extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landfill.landfills-map',['categories' => $this->getData()]);
    }


    protected function getData(): Collection
    {
        return LandfillCategory::activeNoEmptyItems()->get();
    }
}
