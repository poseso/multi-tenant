<?php

namespace App\Models\Admin\Auth;

use Altek\Accountant\Contracts\Recordable;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Altek\Accountant\Recordable as RecordableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 */
class Permission extends SpatiePermission implements Recordable
{
    use RecordableTrait,
        UsesTenantConnection;

    protected $guard_name = 'web';

    public function module() : BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id');
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
                'Crear Usuarios',
                'Ver Usuarios',
                'Modificar Usuarios',
                'Eliminar Usuarios',
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
                'Crear Perfiles',
                'Ver Perfiles',
                'Modificar Perfiles',
                'Eliminar Perfiles',
            ],
            'module_id' => 2,
        ];

        $permissions[] = [
            'name' => [
                'dashboard.read',
            ],
            'display_name' => [
                'Ver Tablero Principal',
            ],
            'module_id' => 3,
        ];

        $permissions[] = [
            'name' => [
                'settings.read',
                'settings.update',
            ],
            'display_name' => [
                'Ver Ajustes',
                'Modificar Ajustes',
            ],
            'module_id' => 4,
        ];

        return $permissions;
    }
}
