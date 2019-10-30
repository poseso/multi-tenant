<?php

namespace App\Listeners\Frontend\System\Auth;

use App\Events\Frontend\System\Auth\UserLoggedIn;
use App\Events\Frontend\System\Auth\UserConfirmed;
use App\Events\Frontend\System\Auth\UserLoggedOut;
use App\Events\Frontend\System\Auth\UserRegistered;
use App\Events\Frontend\System\Auth\UserProviderRegistered;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        $ip_address = request()->getClientIp();

        // Update the logging in users time & IP
        $event->user->fill([
            'last_login_at' => now()->toDateTimeString(),
            'last_login_ip' => $ip_address,
        ]);

        // Update the timezone via IP address
        $geoip = geoip($ip_address);

        if ($event->user->timezone !== $geoip['timezone']) {
            // Update the users timezone
            $event->user->fill([
                'timezone' => $geoip['timezone'],
            ]);
        }

        $event->user->save();

        logger(__('Usuario Inicio Sesión: '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        logger(__('Usuario Cerro Sesión: '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        logger(__('Usuario Registrado: '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onProviderRegistered($event)
    {
        logger(__('Proveedor de Usuario Registrado: '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        logger(__('Usuario Confirmado: '.$event->user->full_name));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserLoggedIn::class,
            'App\Listeners\Frontend\System\Auth\UserEventListener@onLoggedIn'
        );

        $events->listen(
            UserLoggedOut::class,
            'App\Listeners\Frontend\System\Auth\UserEventListener@onLoggedOut'
        );

        $events->listen(
            UserRegistered::class,
            'App\Listeners\Frontend\System\Auth\UserEventListener@onRegistered'
        );

        $events->listen(
            UserProviderRegistered::class,
            'App\Listeners\Frontend\System\Auth\UserEventListener@onProviderRegistered'
        );

        $events->listen(
            UserConfirmed::class,
            'App\Listeners\Frontend\System\Auth\UserEventListener@onConfirmed'
        );
    }
}
