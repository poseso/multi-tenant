<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Altek\Accountant\Recordable as RecordableTrait;

/**
 * Class RecordingModel.
 */
abstract class RecordingModel extends Model implements Recordable
{
    use RecordableTrait,
        UsesTenantConnection;
}
