<?php

namespace App\View\Components\Page;

use Closure;
use Illuminate\View\Component;
use Domain\Setting\Models\Setting;
use Illuminate\Contracts\View\View;

class Contact extends Component
{

    protected $fields = [
        'organization', 
        'inn', 
        'phone',
        'email',
        'vk',
        'tg',
    ];


    protected function getData()
    {
        $fields = $this->fields;
        //return Cache::rememberForever('setting.contacts', function () use($fields) {
            return Setting::whereIn('key',$fields)->pluck('value', 'key');
        //});
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.contact',['setting' => $this->getData()]);
    }

}
