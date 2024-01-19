<?php
namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Contracts\Routing\Registrar;
use App\MoonShine\Controllers\SettingController;



class MoonshineRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar):void
    {        
        Route::middleware('moonshine')
            ->name('moonshine.')
            ->prefix(config('moonshine.route.prefix'))
            ->group(function () {    

                Route::post('/setting-form/update', SettingController::class)->name('setting.update');
            
        });
        
    }
}