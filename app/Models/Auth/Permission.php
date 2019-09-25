<?php

namespace App\Models\Auth;

use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 */
class Permission extends SpatiePermission implements Recordable
{
    use RecordableTrait;

    public static function defaultPermissions()
    {
        return [
            'users.create',
            'users.read',
            'users.update',
            'users.delete',

            'roles.create',
            'roles.read',
            'roles.update',
            'roles.delete',
        ];
    }
}
