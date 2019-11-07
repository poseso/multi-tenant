<?php

namespace App\Models\Admin\Auth;

use Altek\Accountant\Contracts\Recordable;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Spatie\Permission\Models\Role as SpatieRole;
use Altek\Accountant\Recordable as RecordableTrait;
use App\Models\Admin\Auth\Traits\Method\RoleMethod;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role.
 */
class Role extends SpatieRole implements Recordable
{
    use RecordableTrait,
        UsesTenantConnection,
        RoleMethod;

    protected $guard_name = 'web';

    /**
     * A role may be given various permissions.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.permission'),
            config('permission.table_names.role_has_permissions'),
            'role_id',
            'permission_id'
        )->with('module');
    }
}
