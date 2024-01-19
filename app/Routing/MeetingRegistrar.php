<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use Illuminate\Contracts\Routing\Registrar;

final class MeetingRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {    

            Route::get('/meeting', [MeetingController::class, 'index'])->name('meeting.index');

            Route::get('/meeting/{slug}', [MeetingController::class, 'show'])->name('meeting.show');

            Route::post('/get-meetings', [MeetingController::class, 'getMeetings']);
            
        });
    }
}
