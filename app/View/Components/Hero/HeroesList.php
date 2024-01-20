<?php

namespace App\View\Components\Hero;

use Closure;
use Domain\Hero\Models\Hero;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class HeroesList extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero.heroes-list',['heroes' => $this->getData()]);
    }

    protected function getData(): Collection
    {
        return Hero::activeItems()->limit(4)->get();
    }
}
