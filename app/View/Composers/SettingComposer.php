<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Domain\Setting\Models\Setting;

class SettingComposer
{
    public function compose(View $view): void
    {
        $setting = Setting::whereIn('key', ['organization', 'inn','vk','tg'])->select(['key', 'value'])->get()->pluck('value', 'key');
        $view->with('setting',$setting);
    }
}
