<?php

namespace App\Models\Admin\Auth;

use App\Models\Admin\Auth\Traits\Scope\UserScope;
use App\Models\Admin\Auth\Traits\Method\UserMethod;
use App\Models\Admin\Auth\Traits\Attribute\UserAttribute;
use App\Models\Admin\Auth\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;
}
