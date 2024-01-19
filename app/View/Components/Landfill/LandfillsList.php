<?php

namespace App\View\Components\Landfill;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Domain\Landfill\Models\Landfill;
use Domain\Landfill\Models\LandfillCategory;

class LandfillsList extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landfill.landfills-list',[
            'landfills' => $this->getDataLandfills(), 
            'categories' => $this->getDataCategories(),
            ]
        );
    }

    protected function getDataLandfills(): Collection
    {
        return Landfill::activeItems()->limit(24)->get();
    }

    protected function getDataCategories(): Collection
    {
        return LandfillCategory::activeNoEmptyItems()->get();
    }
}
