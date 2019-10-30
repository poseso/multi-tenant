<?php

namespace App\Repositories\Backend\System\Access\User;

use App\Models\System\Auth\User;
use App\Models\System\Auth\SocialAccount;
use App\Exceptions\GeneralException;
use App\Events\Backend\System\Auth\User\UserSocialDeleted;

/**
 * Class SocialRepository.
 */
class SocialRepository
{
    /**
     * @param User        $user
     * @param SocialAccount $social
     *
     * @throws GeneralException
     * @return bool
     */
    public function delete(User $user, SocialAccount $social)
    {
        if ($user->providers()->whereId($social->id)->delete()) {
            event(new UserSocialDeleted($user, $social));

            return true;
        }

        throw new GeneralException(__('Hubo un problema al eliminar la cuenta social del Usuario.'));
    }
}
