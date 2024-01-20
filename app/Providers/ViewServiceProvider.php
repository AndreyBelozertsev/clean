<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\View\Composers\SettingComposer;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\NavigationComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['partials/top-navigation-menu','layouts.app'], NavigationComposer::class);
        View::composer(['layouts.app'], SettingComposer::class);
    }
}
