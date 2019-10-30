<?php

namespace App\Models\System\Auth;

use App\Models\System\Auth\Traits\Scope\UserScope;
use App\Models\System\Auth\Traits\Method\UserMethod;
use App\Models\System\Auth\Traits\Attribute\UserAttribute;
use App\Models\System\Auth\Traits\Relationship\UserRelationship;

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
