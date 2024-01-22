<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use Illuminate\Contracts\Routing\Registrar;

final class VolunteerRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {    

            Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer.index');

            Route::get('/volunteer/create', [VolunteerController::class, 'create'])->name('volunteer.create');

            Route::get('/volunteer/{slug}', [VolunteerController::class, 'show'])->name('volunteer.show');

            Route::post('/volunteer', [VolunteerController::class, 'store'])->name('volunteer.store');
            
        });
    }
}
