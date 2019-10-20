<?php

namespace App\Models\Traits;

/**
 * Class GlobalMethodTrait.
 */
trait GlobalMethodTrait
{
    /**
     * @return bool
     */
    public function isActivo()
    {
        return $this->activo == 1;
    }

    /**
     * @return bool
     */
    public function isInactivo()
    {
        return $this->activo == 0;
    }

    public function isDefault()
    {
        return $this->predeterminado == 1;
    }

    public function isSelected()
    {
        return $this->seleccionado == 1;
    }
}
