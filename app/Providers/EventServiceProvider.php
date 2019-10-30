<?php

namespace App\Providers;

use App\Listeners\Frontend\System\Auth\UserEventListener;
use App\Listeners\Backend\System\Auth\Role\RoleEventListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //
    ];

    /**
     * Class event subscribers.
     *
     * @var array
     */
    protected $subscribe = [
        // Frontend Subscribers

        // Auth Subscribers
        UserEventListener::class,

        // Backend Subscribers

        // Auth Subscribers
        \App\Listeners\Backend\System\Auth\User\UserEventListener::class,
        RoleEventListener::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
