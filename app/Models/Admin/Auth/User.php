<?php

namespace App\Models\Admin\Auth;

use App\Models\Auth\Traits\Scope\UserScope;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use App\Models\Auth\Traits\Method\UserMethod;
use App\Models\Auth\Traits\Attribute\UserAttribute;
use App\Models\Auth\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        UserMethod,
        UserRelationship,
        UsesTenantConnection,
        UserScope;
}
