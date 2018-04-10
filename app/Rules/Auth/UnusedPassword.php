<?php

namespace App\Rules\Auth;

use App\Models\Auth\User;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

/**
 * Class UnusedPassword
 *
 * @package App\Rules\Auth
 */
class UnusedPassword implements Rule
{

	/**
	 * @var
	 */
	protected $user;

    /**
     * Create a new rule instance.
     *
	 * @param $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
    	// Option is off
    	if (! config('access.users.password_history')) {
    		return true;
		}

		if (! $this->user instanceof User) {
    		$this->user = resolve(UserRepository::class)->getById($this->user);
		}

    	$histories = $this->user
			->passwordHistories()
			->latest()
			->take(config('access.users.password_history'))
			->get();

        foreach ($histories as $history) {
			if (Hash::check($value, $history->password)) {
				return false;
			}
		}

		return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('auth.password_used');
    }
}
