<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Routing\Registrar;
use App\Http\Controllers\QuestionController;

final class QuestionRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {

            Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
            
            Route::get('/question/{slug}', [QuestionController::class, 'show'])->name('question.show');

        });
    }
}
