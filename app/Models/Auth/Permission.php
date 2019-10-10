<?php

namespace App\Models\Auth;

use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 */
class Permission extends SpatiePermission implements Recordable
{
    use RecordableTrait;

    public function module() : BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

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
            'display_name' => [
                'Crear usuarios',
                'Ver usuarios',
                'Modificar usuarios',
                'Eliminar usuarios',
            ],
            'module_id' => 1,
        ];

        $permissions[] = [
            'name' => [
                'roles.create',
                'roles.read',
                'roles.update',
                'roles.delete',
            ],
            'display_name' => [
                'Crear perfiles',
                'Ver perfiles',
                'Modificar perfiles',
                'Eliminar perfiles',
            ],
            'module_id' => 2,
        ];

        $permissions[] = [
            'name' => [
                'dashboard.create',
                'dashboard.read',
                'dashboard.update',
                'dashboard.delete',
            ],
            'display_name' => [
                'Crear panel principal',
                'Ver panel principal',
                'Modificar panel principal',
                'Eliminar panel principal',
            ],
            'module_id' => 3,
        ];

        return $permissions;
    }
}
