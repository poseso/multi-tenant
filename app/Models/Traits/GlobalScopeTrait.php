<?php

namespace App\Models\Traits;

/**
 * Class GlobalScopeTrait.
 */
trait GlobalScopeTrait
{
    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActivo($query, $status = true)
    {
        return $query->where('activo', $status);
    }

    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeInactivo($query, $status = false)
    {
        return $query->where('activo', $status);
    }

    /**
     * @param $query
     * @param bool $status
     * @return mixed
     */
    public function scopeSelected($query, $status = true)
    {
        return $query->where('seleccionado', $status);
    }

    /**
     * @param $query
     * @param bool $status
     * @return mixed
     */
    public function scopePredeterminado($query, $status = true)
    {
        return $query->where('predeterminado', $status);
    }

    /**
     * @param $query
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function scopeOrdenar($query, $orderBy = 'id', $sort = 'asc')
    {
        return $query->orderBy($orderBy, $sort);
    }
}
