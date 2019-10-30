<?php

namespace App\Models\Admin\Auth;

use App\Models\Admin\RecordingModel;
use Hyn\Tenancy\Traits\UsesTenantConnection;

/**
 * Class SocialAccount.
 */
class SocialAccount extends RecordingModel
{
    use UsesTenantConnection;

    protected $guard_name = 'web';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_id',
        'token',
        'avatar',
    ];
}
