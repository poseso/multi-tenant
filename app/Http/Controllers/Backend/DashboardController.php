<?php

namespace App\Http\Controllers\Backend;

use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Poseso\Settings\Contracts\RepositoryContract as Settings;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @param Settings $settings
     * @return \Illuminate\View\View
     */
    public function index(Settings $settings)
    {
        $user = Auth::user();
        $user->settings()->set('date_format', "d-m-Y");
        $user->settings()->set('time_format', "g:i A");
        $user->settings()->set('timezone', "America/Santo_Domingo");
        $user->settings()->set('language', "es");
        $user->settings()->set('position', "Empleado");
        $user->settings()->set('representante', $user->full_name);

        $setting = $settings;
        $permissions = Permission::with('module')->selectRaw('module_id')->groupBy('module_id')->get();

        return view('backend.dashboard', compact('permissions', 'setting'));
    }
}
