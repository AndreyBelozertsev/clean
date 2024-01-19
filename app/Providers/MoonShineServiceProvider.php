<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Resources\SeoResource;
use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\HeroResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ArticleResource;
use App\MoonShine\Resources\MeetingResource;
use App\MoonShine\Resources\LandfillResource;
use App\MoonShine\Resources\QuestionResource;
use App\MoonShine\Resources\NavigationResource;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\LandfillCategoryResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => 'Настройки', [
                MenuItem::make(
                    static fn() => 'Пользователи',
                    new MoonShineUserResource()
                )
                ->icon('heroicons.outline.users'),
                MenuItem::make(
                    static fn() => 'Роли',
                    new MoonShineUserRoleResource()
                )
                ->icon('heroicons.outline.bookmark'),
                MenuItem::make(
                    static fn() => 'Меню',
                    new NavigationResource()
                )
                ->icon('heroicons.outline.bars-3-center-left'),
                MenuItem::make(
                    static fn() => 'SEO',
                    new SeoResource()
                )
                ->icon('heroicons.outline.command-line'),
            ])->icon('heroicons.cog')
            ,

            MenuGroup::make(static fn() => 'Свалки', [
                MenuItem::make(
                    static fn() => 'Свалки',
                    new LandfillResource()
                )
                ->icon('heroicons.outline.exclamation-triangle'),
                MenuItem::make(
                    static fn() => 'МО',
                    new CityResource()
                )
                ->icon('heroicons.outline.globe-alt'),
                MenuItem::make(
                    static fn() => 'Статусы',
                    new LandfillCategoryResource()
                )
                ->icon('heroicons.outline.clipboard-document-list'),
                
            ])
            ->icon('heroicons.outline.flag'),

            MenuItem::make(
                static fn() => 'Субботники',
                new MeetingResource()
            )
            ->icon('heroicons.outline.user-group'),
            
            MenuItem::make(
                static fn() => 'Новости',
                new ArticleResource()
            )
            ->icon('heroicons.outline.user-group'),

            MenuItem::make(
                static fn() => 'Наши герои',
                new HeroResource()
            )
            ->icon('heroicons.outline.user-group'),

            MenuItem::make(
                static fn() => 'Мусорный ликбез',
                new QuestionResource()
            )
            ->icon('heroicons.outline.user-group'),

            MenuItem::make(
                static fn() => 'Странцы',
                new PageResource()
            )
            ->icon('heroicons.outline.newspaper'),

            MenuItem::make(
                static fn() => 'Контакты',
                new SettingPage()
            )
            ->icon('heroicons.outline.command-line'),

        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
