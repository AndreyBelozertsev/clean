<?php

namespace Domain\Hero\Providers;

use Illuminate\Support\ServiceProvider;

class HeroServiceProvider extends ServiceProvider
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
