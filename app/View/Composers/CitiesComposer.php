<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Domain\City\Models\City;
use Domain\Setting\Models\Setting;
use Illuminate\Support\Facades\Cache;

class CitiesComposer
{
    public function compose(View $view): void
    {
        $cities = Cache::rememberForever('city_active_list', function () {
            return City::activeItems()->get();
        });


        $view->with('cities',$cities);
    }
}