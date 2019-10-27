<?php

namespace App\Http\Controllers\Backend;

use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;
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
        $config = app(\Hyn\Tenancy\Database\Connection::class)->configuration();
        $setting = $settings;
        $permissions = Permission::with('module')->selectRaw('module_id')->groupBy('module_id')->get();

        return view('backend.dashboard', compact('permissions', 'setting', 'config'));
    }
}
