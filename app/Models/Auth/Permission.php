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
        $permissions = [];

        $permissions[] = [
            'name' => [
                'users.create',
                'users.read',
                'users.update',
                'users.delete',
            ],
            'module_id' => 1
        ];

        $permissions[] = [
            'name' => [
                'roles.create',
                'roles.read',
                'roles.update',
                'roles.delete',
            ],
            'module_id' => 2
        ];

        $permissions[] = [
            'name' => [
                'dashboard.create',
                'dashboard.read',
                'dashboard.update',
                'dashboard.delete',
            ],
            'module_id' => 3
        ];

        return $permissions;
    }
}
