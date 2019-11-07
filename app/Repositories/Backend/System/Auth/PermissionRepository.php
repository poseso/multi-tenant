<?php

namespace App\Repositories\Backend\System\Auth;

use App\Repositories\BaseRepository;
use App\Models\System\Auth\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * PermissionRepository constructor.
     *
     * @param  Permission  $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }
}
