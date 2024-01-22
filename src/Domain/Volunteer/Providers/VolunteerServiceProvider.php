<?php

namespace Domain\Volunteer\Providers;

use Illuminate\Support\ServiceProvider;

class VolunteerServiceProvider extends ServiceProvider
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
