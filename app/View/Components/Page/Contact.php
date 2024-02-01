<?php

namespace App\View\Components\Page;

use Closure;
use Illuminate\View\Component;
use Domain\Setting\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class Contact extends Component
{

    protected function getData()
    {
        return Cache::rememberForever('setting_information', function () {
            return Setting::whereIn('key', config('const.contact_fields'))
                ->select(['key', 'value'])
                ->get()
                ->pluck('value', 'key');
        });
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.contact',['setting' => $this->getData()]);
    }

}
