<?php

namespace App\Http\Controllers\Backend;

use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::with('module')->selectRaw('module_id')->groupBy('module_id')->get();

        return view('backend.dashboard', compact('permissions'));
    }
}
