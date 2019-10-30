<?php

namespace App\Models\Admin\Auth;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

/**
 * Class PasswordHistory.
 */
class PasswordHistory extends Model
{
    use UsesTenantConnection;

    protected $guard_name = 'web';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'password_histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['password'];
}
