<?php

namespace App\Listeners\Backend\System\Auth\User;

use App\Events\Backend\System\Auth\User\UserCreated;
use App\Events\Backend\System\Auth\User\UserDeleted;
use App\Events\Backend\System\Auth\User\UserUpdated;
use App\Events\Backend\System\Auth\User\UserRestored;
use App\Events\Backend\System\Auth\User\UserConfirmed;
use App\Events\Backend\System\Auth\User\UserDeactivated;
use App\Events\Backend\System\Auth\User\UserReactivated;
use App\Events\Backend\System\Auth\User\UserUnconfirmed;
use App\Events\Backend\System\Auth\User\UserSocialDeleted;
use App\Events\Backend\System\Auth\User\UserPasswordChanged;
use App\Events\Backend\System\Auth\User\UserPermanentlyDeleted;

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
        logger(__('Usuario '.$event->user->full_name.' '.'Creado'));
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Actualizado'));
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Eliminado'));
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Confirmado'));
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Desconfirmado'));
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        logger(__('Contraseña Actualizada Para '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Desactivado'));
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Reactivado'));
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        logger(__('Cuenta Social '.$event->user->full_name.' '.'Eliminada'));
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Eliminado Permanentemente'));
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Restaurado'));
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
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onCreated'
        );

        $events->listen(
            UserUpdated::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onUpdated'
        );

        $events->listen(
            UserDeleted::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onDeleted'
        );

        $events->listen(
            UserConfirmed::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onConfirmed'
        );

        $events->listen(
            UserUnconfirmed::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onUnconfirmed'
        );

        $events->listen(
            UserPasswordChanged::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            UserDeactivated::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            UserReactivated::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onReactivated'
        );

        $events->listen(
            UserSocialDeleted::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onSocialDeleted'
        );

        $events->listen(
            UserPermanentlyDeleted::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            UserRestored::class,
            'App\Listeners\Backend\System\Auth\User\UserEventListener@onRestored'
        );
    }
}
