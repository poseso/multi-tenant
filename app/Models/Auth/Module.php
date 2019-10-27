<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Hyn\Tenancy\Traits\UsesSystemConnection;
use Altek\Accountant\Recordable as RecordableTrait;

class Module extends Model implements Recordable
{
    use RecordableTrait,
        UsesSystemConnection;

    protected $table = 'modules';

    public function permissions()
    {
        $this->hasMany(Permission::class);
    }
}
