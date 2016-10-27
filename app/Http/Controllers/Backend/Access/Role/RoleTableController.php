<?php

namespace App\Http\Controllers\Backend\Access\Role;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Http\Requests\Backend\Access\Role\ManageRoleRequest;

/**
 * Class RoleTableController
 * @package App\Http\Controllers\Access
 */
class RoleTableController extends Controller
{
	/**
	 * @var RoleRepository
	 */
	protected $roles;

	/**
	 * @param RoleRepository       $roles
	 */
	public function __construct(RoleRepository $roles)
	{
		$this->roles = $roles;
	}

	/**
	 * @param ManageRoleRequest $request
	 * @return mixed
	 */
	public function __invoke(ManageRoleRequest $request)
	{
		return Datatables::of($this->roles->getAll())
			->addColumn('permissions', function($role) {
				$permissions = [];

				if ($role->all)
					return '<span class="label label-success">' . trans('labels.general.all') . '</span>';

				if (count($role->permissions) > 0) {
					foreach ($role->permissions as $permission) {
						array_push($permissions, $permission->display_name);
					}

					return implode("<br/>", $permissions);
				} else {
					return '<span class="label label-danger">' . trans('labels.general.none') . '</span>';
				}
			})
			->addColumn('users', function($role) {
				return $role->users->count();
			})
			->addColumn('actions', function($role) {
				return $role->action_buttons;
			})
			->make(true);
	}
}