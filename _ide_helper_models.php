<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Auth{
/**
 * App\Models\Auth\Module
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module query()
 */
	class Module extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class PasswordHistory.
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory query()
 */
	class PasswordHistory extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class Permission.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @property-read \App\Models\Auth\Module $module
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class Role.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role query()
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class SocialAccount.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount query()
 */
	class SocialAccount extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class User.
 *
 * @property-read string $full_name
 * @property-read string $name
 * @property-read string $permissions_label
 * @property-read mixed $picture
 * @property-read string $roles_label
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\PasswordHistory[] $passwordHistories
 * @property-read int|null $password_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\SocialAccount[] $providers
 * @property-read int|null $providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Role[] $roles
 * @property-read int|null $roles_count
 * @property-write mixed $password
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User active($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User confirmed($confirmed = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\BaseUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\BaseUser role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\BaseUser uuid($uuid)
 */
	class User extends \Eloquent {}
}

