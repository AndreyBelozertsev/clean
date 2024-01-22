<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Domain\Seo\Providers\SeoServiceProvider;
use Domain\Auth\Providers\AuthServiceProvider;
use Domain\Volunteer\Providers\VolunteerServiceProvider;
use Domain\Page\Providers\PageServiceProvider;
use Domain\Article\Providers\ArticleServiceProvider;
use Domain\Meeting\Providers\MeetingServiceProvider;
use Domain\Setting\Providers\SettingServiceProvider;
use Domain\Landfill\Providers\LandfillServiceProvider;
use Domain\Question\Providers\QuestionServiceProvider;


class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(
            AuthServiceProvider::class
        );

        $this->app->register(
            ArticleServiceProvider::class
        );

        $this->app->register(
            VolunteerServiceProvider::class
        );

        $this->app->register(
            LandfillServiceProvider::class
        );

        $this->app->register(
            MeetingServiceProvider::class
        );

        $this->app->register(
            PageServiceProvider::class
        );

        $this->app->register(
            QuestionServiceProvider::class
        );

        $this->app->register(
            SeoServiceProvider::class
        );

        $this->app->register(
            SettingServiceProvider::class
        );


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
