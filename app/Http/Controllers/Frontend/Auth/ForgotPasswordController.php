<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('frontend.auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $this->sendResetLinkResponse($request, $response);
    }

    /**
     * Validate the email for the given request.
     *
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return mixed
     */
    protected function validateEmail(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $messages = [
            'email.required' => __('El campo Dirección de correo es obligatorio.'),
        ];

        $this->validate($request, $rules, $messages);

        return redirect()->route(home_route())->withFlashSuccess(__('¡Le hemos enviado el enlace para el reinicio de la contraseña a su correo!'));
    }
}
