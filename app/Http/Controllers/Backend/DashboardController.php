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
        $setting = $settings;
        $permissions = Permission::with('module')->selectRaw('module_id')->groupBy('module_id')->get();

        return view('backend.dashboard', compact('permissions', 'setting'));
    }
}
