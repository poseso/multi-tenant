<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function clearSession(ManageUserRequest $request, User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->withFlashDanger(__('No puedes eliminar tu propia sesión.'));
        }

        $user->update(['to_be_logged_out' => true]);

        return redirect()->back()->withFlashSuccess(__('La sesión del usuario se limpio correctamente.'));
    }
}
