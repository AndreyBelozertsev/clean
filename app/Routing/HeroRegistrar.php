<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use Illuminate\Contracts\Routing\Registrar;

final class HeroRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {    

            Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');

            Route::get('/hero/{slug}', [HeroController::class, 'show'])->name('hero.show');
            
        });
    }
}
