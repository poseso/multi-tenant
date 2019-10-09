<?php

namespace App\Http\Controllers\Backend\Auth\User;

use DataTables;
use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Show the DataTables resource.
     *
     * @param UserRequest $request
     * @throws \Exception
     * @return mixed
     */
    public function getDataTables(ManageUserRequest $request)
    {
        return Datatables::of($this->userRepository->getForDataTable($request->get('status'), $request->get('trashed')))
            ->escapeColumns(['first_name', 'last_name', 'email'])
            ->editColumn('confirmed', function ($user) {
                return view('backend.auth.user.includes.confirm', ['user' => $user]);
            })
            ->filterColumn('confirmed', function ($query, $keyword) {
                $param = (strtolower($keyword) == __('si')) ? 1 : 0;
                $query->where('confirmed', '=', $param);
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->tz(get_timezone())->format(get_full_date());
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                if (strpos($keyword, '-') !== false) {
                    $value = collect(explode('-', $keyword))
                        ->reverse()
                        ->implode('-');
                    $query->where('updated_at', 'like', "%$value%");
                }
            })
            ->addColumn('social', function ($user) {
                return view('backend.auth.user.includes.social-buttons', ['user' => $user]);
            })
            ->addColumn('roles', function ($user) {
                return "<span class='badge badge-success bg-light-blue-a300'>$user->roles_label</span>";
            })
            ->addColumn('permissions', function ($user) {
                return $user->permissions_label;
            })
            ->addColumn('actions', function ($user) {
                return view('backend.auth.user.includes.actions', ['user' => $user]);
            })
            ->make(true);
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'username',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('El usuario fue creado correctamente.'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show(ManageUserRequest $request, User $user)
    {
        return view('backend.auth.user.show')
            ->withUser($user);
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository, User $user)
    {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'username',
            'email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__("El Usuario $user->full_name fue actualizado correctamente."));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \Exception
     * @return mixed
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->userRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__("El usuario $user->full_name fue eliminado correctamente."));
    }
}
