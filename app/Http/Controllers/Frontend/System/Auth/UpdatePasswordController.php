<?php

namespace App\Http\Controllers\Frontend\System\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\System\Auth\UserRepository;
use App\Http\Requests\Frontend\System\User\UpdatePasswordRequest;

/**
 * Class UpdatePasswordController.
 */
class UpdatePasswordController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UpdatePasswordRequest $request
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function update(UpdatePasswordRequest $request)
    {
        $this->userRepository->updatePassword($request->only('old_password', 'password'));

        return redirect()->to(route('frontend.user.account').'#password')->withFlashSuccess(__('Contraseña actualizada correctamente.'));
    }
}
