<?php

namespace App\Providers;

use App\Models\System\Auth\User;
use Illuminate\Support\ServiceProvider;
use App\Observers\System\User\UserObserver;

/**
 * Class ObserverServiceProvider.
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
