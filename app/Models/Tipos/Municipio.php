<?php

namespace App\Models\Tipos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\GlobalScopeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Municipio extends Model
{
    use SoftDeletes,
        GlobalScopeTrait;

    protected $table = 'municipios';

    protected $casts = [
        'activo' => 'boolean',
    ];
}
