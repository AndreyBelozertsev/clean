<?php

namespace Domain\City\Providers;

use Illuminate\Support\ServiceProvider;

class CityServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        $this->app->register(
            ActionsServiceProvider::class
        );
    }
}
