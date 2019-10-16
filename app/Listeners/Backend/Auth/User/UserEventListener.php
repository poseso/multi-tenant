<?php

namespace App\Listeners\Backend\Auth\User;

use App\Events\Backend\Auth\User\UserCreated;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Events\Backend\Auth\User\UserUpdated;
use App\Events\Backend\Auth\User\UserRestored;
use App\Events\Backend\Auth\User\UserConfirmed;
use App\Events\Backend\Auth\User\UserDeactivated;
use App\Events\Backend\Auth\User\UserReactivated;
use App\Events\Backend\Auth\User\UserUnconfirmed;
use App\Events\Backend\Auth\User\UserSocialDeleted;
use App\Events\Backend\Auth\User\UserPasswordChanged;
use App\Events\Backend\Auth\User\UserPermanentlyDeleted;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        logger(__("Usuario $event->username Creado"));
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        logger(__("Usuario $event->username Actualizado"));
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        logger(__("Usuario $event->username Eliminado"));
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        logger(__("Usuario $event->username Confirmado"));
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        logger(__("Usuario $event->username desconfirmado"));
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        logger(__("Contraseña actualizada para $event->username"));
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        logger(__("Usuario $event->username Desactivado"));
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        logger(__("Usuario $event->username Reactivado"));
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        logger(__("Cuenta Social $event->full_name Eliminada"));
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        logger(__("Usuario $event->username Eliminado Permanentemente"));
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        logger(__("Usuario $event->username Restaurado"));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserCreated::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onCreated'
        );

        $events->listen(
            UserUpdated::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onUpdated'
        );

        $events->listen(
            UserDeleted::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onDeleted'
        );

        $events->listen(
            UserConfirmed::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onConfirmed'
        );

        $events->listen(
            UserUnconfirmed::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onUnconfirmed'
        );

        $events->listen(
            UserPasswordChanged::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            UserDeactivated::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            UserReactivated::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onReactivated'
        );

        $events->listen(
            UserSocialDeleted::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onSocialDeleted'
        );

        $events->listen(
            UserPermanentlyDeleted::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            UserRestored::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onRestored'
        );
    }
}
