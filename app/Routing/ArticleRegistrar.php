<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use Illuminate\Contracts\Routing\Registrar;

final class ArticleRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {

            Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
            
            Route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');

        });
    }
}
