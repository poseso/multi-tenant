<?php

namespace App\Http\Controllers\Backend\System\Auth\User;

use App\Models\System\Auth\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\System\Auth\UserRepository;
use App\Http\Requests\Backend\System\Auth\User\ManageUserRequest;
use App\Notifications\Frontend\System\Auth\UserNeedsConfirmation;

/**
 * Class UserConfirmationController.
 */
class UserConfirmationController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function sendConfirmationEmail(ManageUserRequest $request, User $user)
    {
        // Shouldn't allow users to confirm their own accounts when the application is set to manual confirmation
        if (config('access.users.requires_approval')) {
            return redirect()->back()->withFlashDanger(__('La aplicación está configurada actualmente para aprobar de forma manual a los usuarios.'));
        }

        if ($user->isConfirmed()) {
            return redirect()->back()->withFlashSuccess(__('Este usuario ya está confirmado.'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(__('Un nuevo mensaje de confirmación ha sido enviado a tu correo.'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function confirm(ManageUserRequest $request, User $user)
    {
        $this->userRepository->confirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('El usuario fue confirmado exitosamente.'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function unconfirm(ManageUserRequest $request, User $user)
    {
        $this->userRepository->unconfirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('El usuario fue desconfirmado correctamente.'));
    }
}
