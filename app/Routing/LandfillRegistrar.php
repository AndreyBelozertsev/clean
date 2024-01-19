<?php

declare(strict_types=1);

namespace App\Routing;

use App\Contracts\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Routing\Registrar;
use App\Http\Controllers\LandfillController;
use App\Http\Controllers\LandfillCategoryController;

final class LandfillRegistrar implements RouteRegistrar
{
    public function map(Registrar $registrar): void
    {
        Route::middleware('web')->group(function () {  

            Route::get('/landfill', [LandfillController::class, 'index'])->name('landfill.index');

            Route::get('/landfill-map', [LandfillController::class, 'indexMap'])->name('landfill-map.index');

            Route::get('/landfill/create', [LandfillController::class, 'create'])->name('landfill.create');

            Route::get('/landfill/{slug}', [LandfillController::class, 'show'])->name('landfill.show');

            Route::post('/landfill', [LandfillController::class, 'store'])->name('landfill.store');

            Route::post('/get-landfills', [LandfillController::class, 'getLandfills']);

            Route::get('/search',[LandfillController::class,'search'])->name('search');

            Route::post('/search-ajax',[LandfillController::class,'searchAsync'])->name('search_async');

            
        });
    }
}
