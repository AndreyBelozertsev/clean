<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Domain\Setting\Models\Setting;

class UuidComposer
{
    public function compose(View $view): void
    {
        $uuid = getUuid();
        $view->with('custom_uuid',$uuid);
    }
}