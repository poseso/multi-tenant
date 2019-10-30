<?php

namespace App\Http\Controllers\Frontend\System\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\System\Auth\UserRepository;
use App\Notifications\Frontend\System\Auth\UserNeedsConfirmation;

/**
 * Class ConfirmAccountController.
 */
class ConfirmAccountController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ConfirmAccountController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param $token
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function confirm($token)
    {
        $this->user->confirm($token);

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('¡Su cuenta ha sido verificada satisfactoriamente!'));
    }

    /**
     * @param $uuid
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function sendConfirmationEmail($uuid)
    {
        $user = $this->user->findByUuid($uuid);

        if ($user->isConfirmed()) {
            return redirect()->route('frontend.auth.login')->withFlashSuccess(__('Su cuenta ya ha sido verificada.'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('Un nuevo correo de verificación le ha sido enviado.'));
    }
}
