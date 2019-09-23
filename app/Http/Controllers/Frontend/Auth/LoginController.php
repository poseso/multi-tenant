<?php

namespace App\Http\Controllers\Frontend\Auth;

use Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class LoginController.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        $user = Auth::user();
        Settings::scope($user)->set('representante', Auth::user()->fullname);

        return route(home_route());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return config('access.users.username');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request $request
     *
     */
    protected function validateLogin(Request $request)
    {
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([
            $field => $request->input('email'),
        ]);

        $request->validate([
            $field => 'required|string',
            'password' => PasswordRules::login(),
            'g-recaptcha-response' => ['required_if:captcha_status,true', 'captcha'],
        ], [
            'username.required' => __('El campo usuario o correo electrónico es obligatorio.'),
            'password.required' => __('El campo contraseña es obligatorio.'),
            'g-recaptcha-response.required_if' => __('El campo :attribute es obligatorio.', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $request->only($field, 'password');
    }

    /**
     * Get the failed login response instance.
     *
     * @param Request $request
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [__('Las credenciales no se han encontrado.')],
        ]);
    }

    /**
     * The user has been authenticated.
     *
     * @param Request $request
     * @param         $user
     *
     * @throws GeneralException
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check to see if the users account is confirmed and active
        if (! $user->isConfirmed()) {
            auth()->logout();

            // If the user is pending (account approval is on)
            if ($user->isPending()) {
                throw new GeneralException(__('Su cuenta está actualmente pendiente de aprobación.'));
            }

            // Otherwise see if they want to resent the confirmation e-mail

            throw new GeneralException(__(
                'Su cuenta no ha sido verificada todavía. Por favor, revise su correo, o 
                <a href="'.route('auth.account.confirm.resend', ':user_uuid').'">
                    pulse aquí
                </a> 
                    para re-enviar el correo de verificación.',
                ['user_uuid' => e($user->{$user->getUuidName()})]
            ));
        }

        if (! $user->isActive()) {
            auth()->logout();

            throw new GeneralException(__('Su cuenta ha sido desactivada.'));
        }

        event(new UserLoggedIn($user));

        if (config('access.users.single_login')) {
            auth()->logoutOtherDevices($request->password);
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Remove the socialite session variable if exists
        if (app('session')->has(config('access.socialite_session_name'))) {
            app('session')->forget(config('access.socialite_session_name'));
        }

        // Fire event, Log out user, Redirect
        event(new UserLoggedOut($request->user()));

        // Laravel specific logic
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect()->route('frontend.auth.login');
    }
}
