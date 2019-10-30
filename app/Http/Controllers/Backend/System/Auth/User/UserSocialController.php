<?php

namespace App\Http\Controllers\Backend\System\Auth\User;

use App\Models\System\Auth\User;
use App\Models\System\Auth\SocialAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\System\Auth\User\ManageUserRequest;
use App\Repositories\Backend\System\Access\User\SocialRepository;

/**
 * Class UserSocialController.
 */
class UserSocialController extends Controller
{
    /**
     * @param ManageUserRequest $request
     * @param SocialRepository  $socialRepository
     * @param User              $user
     * @param SocialAccount     $social
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function unlink(ManageUserRequest $request, SocialRepository $socialRepository, User $user, SocialAccount $social)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('La cuenta social fue eliminada correctamente.'));
    }
}
