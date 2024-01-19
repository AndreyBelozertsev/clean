<?php

namespace App\View\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use Illuminate\View\View;
use Domain\Setting\Models\Navigation;
use Illuminate\Support\Facades\Cache;

class NavigationComposer
{
    public function compose(View $view): void
    {
        $menu = Menu::make();

        $menu_items = Cache::rememberForever('navigation_menu', function () {
            return Navigation::activeItems()->get();
        });
        
        $menu_items->each(function ($item, $key) use($menu) {
            $menu->add(MenuItem::make($item->url ? $item->url : '', $item->title)); 
        });

        $view->with('menu',$menu);
    }
}
