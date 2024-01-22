<?php

namespace App\Providers;

use RuntimeException;
use Illuminate\Http\Request;
use App\Routing\AppRegistrar;
use App\Routing\SeoRegistrar;
use App\Routing\AuthRegistrar;
use App\Routing\HeroRegistrar;
use App\Routing\PageRegistrar;
use App\Contracts\RouteRegistrar;
use App\Routing\ArticleRegistrar;
use App\Routing\MeetingRegistrar;
use App\Routing\SettingRegistrar;
use App\Routing\LandfillRegistrar;
use App\Routing\QuestionRegistrar;
use App\Routing\MoonshineRegistrar;
use App\Routing\VolunteerRegistrar;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    protected array $registrars =[
        AppRegistrar::class,
        AuthRegistrar::class,
        ArticleRegistrar::class,
        VolunteerRegistrar::class,
        LandfillRegistrar::class,
        MeetingRegistrar::class,
        MoonshineRegistrar::class,
        SeoRegistrar::class,
        SettingRegistrar::class,
        QuestionRegistrar::class,
        PageRegistrar::class,
    ];

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function(Registrar $router){
            $this->mapRoutes($router, $this->registrars );
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('auth', function (Request $request) {
            return Limit::perMinute(20)->by($request->ip());
        });
    }

    protected function mapRoutes(Registrar $router, array $registrars):void
    {
        foreach($registrars as $registrar){
            if(! class_exists($registrar) || ! is_subclass_of($registrar, RouteRegistrar::class)){
                throw new RuntimeException(sprintf(
                    'Cannot map routes \'%s\', its not a valid routes class',
                    $registrar
                ));

            }

            (new $registrar)->map($router);
        }
    }
}
