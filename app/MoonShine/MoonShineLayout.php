<?php

declare(strict_types=1);

namespace App\MoonShine;

use MoonShine\Components\Layout\{Content,
    Flash,
    Footer,
    Header,
    LayoutBlock,
    LayoutBuilder,
    Menu,
    Profile,
    Search,
    TopBar};

use MoonShine\Components\When;
use App\Moonshine\Components\Sidebar;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Contracts\MoonShineLayoutContract;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            TopBar::make([
                ActionButton::make(
                    label: 'На сайт',
                    url: '/',
                ),
            ]),
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
            ]),
            LayoutBlock::make([

                Flash::make(),
                Header::make(),
                Content::make(),
                Footer::make(),
            ])->customAttributes(['class' => 'layout-page']),
        ])->customAttributes(['style' => 'padding-left: 18rem;']);
    }
}
