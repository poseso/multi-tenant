<?php

namespace App\Repositories\Backend\System\Auth;

use App\Models\System\Auth\Permission;
use App\Repositories\BaseRepository;

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
