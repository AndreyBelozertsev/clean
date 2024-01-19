<?php 

namespace App\MoonShine\Pages;


use MoonShine\Pages\Crud\IndexPage;
use Leeto\MoonShineTree\View\Components\TreeComponent;

class NavigationTreePage extends IndexPage
{
    protected function mainLayer(): array
    {
        return [
            ...$this->actionButtons(),
            TreeComponent::make($this->getResource()),
        ];
    }
}