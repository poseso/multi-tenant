<?php

namespace App\Models\Auth;
use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Module extends SpatiePermission implements Recordable
{
    use RecordableTrait;

    protected $table = 'modules';
}
