<?php

namespace App\Providers;

use Domain\City\Models\City;
use Domain\Page\Models\Page;
use App\Events\LandfillCreated;
use App\Observers\CityObserver;
use App\Observers\PageObserver;
use App\Events\VolunteerCreated;
use App\Observers\MeetingObserver;
use Domain\Meeting\Models\Meeting;
use App\Observers\LandfillObserver;
use Domain\Landfill\Models\Landfill;
use App\Observers\NavigationObserver;
use Domain\Setting\Models\Navigation;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendLandfillNotification;
use App\Observers\LandfillCategoryObserver;
use App\Listeners\SendVolunteerNotification;
use Domain\Landfill\Models\LandfillCategory;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        LandfillCreated::class => [
            SendLandfillNotification::class 
        ],
        VolunteerCreated::class => [
            SendVolunteerNotification::class 
        ],
    ];

    protected $observers = [
        Navigation::class => [NavigationObserver::class],
        City::class => [CityObserver::class],
        Meeting::class => [MeetingObserver::class],
        Page::class => [PageObserver::class],
        Landfill::class => [LandfillObserver::class],
        LandfillCategory::class => [LandfillCategoryObserver::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
