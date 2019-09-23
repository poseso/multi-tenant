<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Auth\Access\AuthorizationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Class Handler.
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        GeneralException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     *
     * @throws Exception
     * @return mixed|void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof UnauthorizedException) {
            return redirect()
                ->route(home_route())
                ->withFlashDanger(__('No está autorizado para acceder a esta sección..'));
        }

        if ($exception instanceof AuthorizationException) {
            return response(view('errors.403'));
        }

        if ($exception instanceof TokenMismatchException) {
            return redirect()
                ->route('frontend.auth.login')
                ->withFlashDanger(__('Su sesión ha expirado. Favor iniciar sesión nuevamente.'));
        }

        if ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();

            if (view()->exists('errors.'.$statusCode)) {
                return response(view('errors.'.$statusCode, [
                    'msg' => $exception->getMessage(),
                    'code' => $statusCode,
                ]), $statusCode);
            }
        }

        if ($exception instanceof ModelNotFoundException) {
            return response(view('errors.404'));
        }

        return parent::render($request, $exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException  $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response()->json(['message' => 'Unauthenticated.'], 401)
            : redirect()->guest(route('frontend.auth.login'));
    }
}
