<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Hyn\Tenancy\Traits\UsesSystemConnection;
use Altek\Accountant\Recordable as RecordableTrait;

/**
 * Class RecordingModel.
 */
abstract class RecordingModel extends Model implements Recordable
{
    use RecordableTrait,
        UsesSystemConnection;
}
