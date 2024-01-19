<?php

declare(strict_types=1);

namespace App\MoonShine\Components;

use Closure;
use Illuminate\Contracts\View\View;
use MoonShine\Components\Layout\Sidebar as SidebarParent;
use MoonShine\Components\MoonShineComponent;

/**
 * @method static static make()
 */
final class Sidebar extends SidebarParent
{
    protected string $view = 'admin.components.sidebar';
}
