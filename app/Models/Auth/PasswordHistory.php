<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesSystemConnection;

/**
 * Class PasswordHistory.
 */
class PasswordHistory extends Model
{
    use UsesSystemConnection;

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
