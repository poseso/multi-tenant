<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\System\Auth{
/**
 * Class User.
 *
 * @property-read string $full_name
 * @property-read string $name
 * @property-read string $permissions_label
 * @property-read mixed $picture
 * @property-read string $roles_label
 * @property array $settings
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\PasswordHistory[] $passwordHistories
 * @property-read int|null $password_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\SocialAccount[] $providers
 * @property-read int|null $providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\Role[] $roles
 * @property-read int|null $roles_count
 * @property-write mixed $password
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\User active($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\User confirmed($confirmed = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\BaseUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\BaseUser role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\BaseUser uuid($uuid)
 */
	class User extends \Eloquent {}
}

namespace App\Models\System\Auth{
/**
 * Class Role.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Role query()
 */
	class Role extends \Eloquent {}
}

namespace App\Models\System\Auth{
/**
 * App\Models\System\Auth\Module
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Module query()
 */
	class Module extends \Eloquent {}
}

namespace App\Models\System\Auth{
/**
 * Class Permission.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @property-read \App\Models\System\Auth\Module $module
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\Auth\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models\System\Auth{
/**
 * Class PasswordHistory.
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\PasswordHistory query()
 */
	class PasswordHistory extends \Eloquent {}
}

namespace App\Models\System\Auth{
/**
 * Class SocialAccount.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\SocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\SocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Auth\SocialAccount query()
 */
	class SocialAccount extends \Eloquent {}
}

namespace App\Models\System\Tipos{
/**
 * App\Models\System\Tipos\Pais
 *
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais activo($status = true)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais inactivo($status = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Pais onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais ordenar($orderBy = 'id', $sort = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais predeterminado($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Pais selected($status = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Pais withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Pais withoutTrashed()
 */
	class Pais extends \Eloquent {}
}

namespace App\Models\System\Tipos{
/**
 * App\Models\System\Tipos\Municipio
 *
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio activo($status = true)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio inactivo($status = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Municipio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio ordenar($orderBy = 'id', $sort = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio predeterminado($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Municipio selected($status = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Municipio withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Municipio withoutTrashed()
 */
	class Municipio extends \Eloquent {}
}

namespace App\Models\System\Tipos{
/**
 * App\Models\System\Tipos\Provincia
 *
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia activo($status = true)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia inactivo($status = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Provincia onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia ordenar($orderBy = 'id', $sort = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia predeterminado($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Tipos\Provincia selected($status = true)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Provincia withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\Tipos\Provincia withoutTrashed()
 */
	class Provincia extends \Eloquent {}
}

