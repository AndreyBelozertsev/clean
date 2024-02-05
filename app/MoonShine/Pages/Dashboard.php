<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use Illuminate\Support\Collection;
use MoonShine\Metrics\ValueMetric;
use Domain\Volunteer\Models\Volunteer;
use MoonShine\Metrics\DonutChartMetric;
use Domain\Landfill\Models\LandfillCategory;

class Dashboard extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Главная';
    }

    public function components(): array
    {
        return [
            Tabs::make([ 
                Tab::make('Свалки', [
                    DonutChartMetric::make('Свалок') 
                    ->values($this->getLandfillStatustic())
                ]), 
                Tab::make('Волонтеры', [
                    ValueMetric::make('Всего волонтеров')
                        ->value(Volunteer::public()->count()) 
                ])
            ])
        ];
    }

    protected function getLandfillStatustic(): array
    {
         return LandfillCategory::landfillsCountGroupByCategory()->get()->pluck('landfills_count', 'title')->toArray();
    } 
}
