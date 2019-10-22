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
 * Class User.
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $avatar_type
 * @property string|null $avatar_location
 * @property string|null $password
 * @property \Illuminate\Support\Carbon|null $password_changed_at
 * @property bool $active
 * @property string|null $confirmation_code
 * @property bool $confirmed
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property bool $to_be_logged_out
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\PasswordHistory[] $passwordHistories
 * @property-read int|null $password_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\SocialAccount[] $providers
 * @property-read int|null $providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User active($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User confirmed($confirmed = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\BaseUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\BaseUser role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\BaseUser uuid($uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereAvatarLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereAvatarType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereToBeLoggedOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\User whereUuid($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class Role.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\Module
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Module whereUpdatedAt($value)
 */
	class Module extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class Permission.
 *
 * @property int $id
 * @property int $module_id
 * @property string $name
 * @property string|null $display_name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class PasswordHistory.
 *
 * @property int $id
 * @property int $user_id
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\PasswordHistory whereUserId($value)
 */
	class PasswordHistory extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * Class SocialAccount.
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Altek\Accountant\Models\Ledger[] $ledgers
 * @property-read int|null $ledgers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Auth\SocialAccount whereUserId($value)
 */
	class SocialAccount extends \Eloquent {}
}

namespace App\Models\Tipos{
/**
 * App\Models\Tipos\Pais
 *
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $codigo
 * @property string $iso
 * @property string $descripcion
 * @property string $nacionalidad
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais activo($status = true)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais inactivo($status = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Pais onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais ordenar($orderBy = 'id', $sort = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais predeterminado($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais selected($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereNacionalidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Pais whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Pais withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Pais withoutTrashed()
 */
	class Pais extends \Eloquent {}
}

namespace App\Models\Tipos{
/**
 * App\Models\Tipos\Municipio
 *
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $pais_id
 * @property int $provincia_id
 * @property string $descripcion
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio activo($status = true)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio inactivo($status = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Municipio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio ordenar($orderBy = 'id', $sort = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio predeterminado($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio selected($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio wherePaisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio whereProvinciaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Municipio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Municipio withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Municipio withoutTrashed()
 */
	class Municipio extends \Eloquent {}
}

namespace App\Models\Tipos{
/**
 * App\Models\Tipos\Provincia
 *
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $pais_id
 * @property string $descripcion
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia activo($status = true)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia inactivo($status = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Provincia onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia ordenar($orderBy = 'id', $sort = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia predeterminado($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia selected($status = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia wherePaisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipos\Provincia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Provincia withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tipos\Provincia withoutTrashed()
 */
	class Provincia extends \Eloquent {}
}

