<?php

namespace App\Models\System\Auth;

use App\Models\System\RecordingModel;
use Hyn\Tenancy\Traits\UsesSystemConnection;

/**
 * Class SocialAccount.
 */
class SocialAccount extends RecordingModel
{
    use UsesSystemConnection;

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
