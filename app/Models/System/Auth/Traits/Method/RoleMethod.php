<?php

namespace App\Models\System\Auth\Traits\Method;

/**
 * Trait RoleMethod.
 */
trait RoleMethod
{
    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->name === config('access.users.super_admin_role');
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->name === config('access.users.admin_role');
    }
}
