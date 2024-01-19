<?php
namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Contracts\Routing\Registrar;



class PageRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar):void
    {  
        Route::middleware('web')->group(function () {      
            Route::get('/{slug?}', [PageController::class, 'show'])->name('page.show');
        });
        
    }
}