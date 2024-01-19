<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Domain\Auth\Models\User;
use Domain\Hero\Models\Hero;
use Domain\Article\Models\Article;
use Domain\Meeting\Models\Meeting;
use MoonShine\Models\MoonshineUser;
use Domain\Landfill\Models\Landfill;
use Domain\Question\Models\Question;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'article' => Article::class, 
            'hero' => Hero::class,
            'landfill' => Landfill::class,
            'meeting' => Meeting::class, 
            'user' => MoonshineUser::class,
            'question' => Question::class,
        ]);

        Str::macro('phoneNumber', function ($string) {
            return preg_replace('/^8{1}/', '7', preg_replace('/[^0-9]/', '', $string));
        });
    }
}
