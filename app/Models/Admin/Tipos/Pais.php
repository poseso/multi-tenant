<?php

namespace App\Models\Admin\Tipos;

use App\Models\Traits\GlobalScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property bool $activo
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Pais extends Model
{
    use SoftDeletes,
        GlobalScopeTrait,
        UsesTenantConnection;

    protected $table = 'paises';

    protected $casts = [
        'activo' => 'boolean',
    ];
}
