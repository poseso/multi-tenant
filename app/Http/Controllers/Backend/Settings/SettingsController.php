<?php

namespace App\Http\Controllers\Backend\Settings;

use Settings;
use App\Models\Tipos\Pais;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\Settings\SettingsRequest;

/**
 * Class SettingsController.
 */
class SettingsController extends Controller
{
    public function index()
    {
        $paises = Pais::all();

        return view('frontend.user.account.tabs.settings')
            ->withPaises($paises);
    }

    /**
     * @param SettingsRequest $request
     * @return mixed
     */
    public function updateUserSettings(SettingsRequest $request)
    {
        $user = Auth::user();
        Settings::scope($user)->set('date_format', $request->settings['date_format']);
        Settings::scope($user)->set('time_format', $request->settings['time_format']);
        Settings::scope($user)->set('timezone', $request->settings['timezone']);
        Settings::scope($user)->set('language', $request->settings['language']);
        Settings::scope($user)->set('position', $request->settings['position']);

        return redirect()->to(route('frontend.user.account').'#settings')->withFlashSuccess(__('Ajustes actualizados satisfactoriamente.'));
    }

    public function updateSettings(SettingsRequest $request)
    {
        settings()->set($request->settings);

        return redirect()->route('admin.settings.general')->withFlashSuccess(__('Ajustes actualizados satisfactoriamente.'));
    }
}
