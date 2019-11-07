<?php

namespace App\Listeners\Backend\System\Auth\Role;

use App\Events\Backend\System\Auth\Role\RoleCreated;
use App\Events\Backend\System\Auth\Role\RoleDeleted;
use App\Events\Backend\System\Auth\Role\RoleUpdated;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        logger(__("Perfil Creado"));
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        logger(__("Perfil Actualizado"));
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        logger(__("Perfil Eliminado"));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            RoleCreated::class,
            'App\Listeners\Backend\System\Auth\Role\RoleEventListener@onCreated'
        );

        $events->listen(
            RoleUpdated::class,
            'App\Listeners\Backend\System\Auth\Role\RoleEventListener@onUpdated'
        );

        $events->listen(
            RoleDeleted::class,
            'App\Listeners\Backend\System\Auth\Role\RoleEventListener@onDeleted'
        );
    }
}
