<?php

namespace App\Models\System\Auth;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesSystemConnection;

class UserLog extends Model implements \Altek\Accountant\Contracts\Ledger
{
    use UsesSystemConnection,
        \Altek\Accountant\Ledger;

    protected $table = 'ledgers';

    protected $casts = [
        'properties' => 'json',
        'modified' => 'json',
        'pivot' => 'json',
        'extra' => 'json',
    ];

    public function recordableUser()
    {
        return $this->belongsTo(User::class, 'recordable_id');
    }
}
