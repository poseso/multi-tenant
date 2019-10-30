<?php

namespace App\Models\Admin\Auth;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Altek\Accountant\Recordable as RecordableTrait;

class Module extends Model implements Recordable
{
    use RecordableTrait,
        UsesTenantConnection;

    protected $guard_name = 'web';

    protected $table = 'modules';

    public function permissions()
    {
        $this->hasMany(Permission::class);
    }
}
