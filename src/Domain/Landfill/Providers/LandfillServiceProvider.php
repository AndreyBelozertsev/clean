<?php

namespace Domain\Landfill\Providers;

use Illuminate\Support\ServiceProvider;

class LandfillServiceProvider extends ServiceProvider
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
