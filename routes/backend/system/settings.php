<?php

// All route names are prefixed with 'settings.'.
use App\Http\Controllers\Backend\System\Settings\SettingsController;

Route::group([
    'namespace' => 'Settings',
    'prefix' => 'settings',
    'as' => 'settings.',
    'middleware' => 'password_expires',
], function () {
    Route::get('general', [SettingsController::class, 'index'])->name('general');
    Route::patch('general', [SettingsController::class, 'updateSettings'])->name('general.patch');
});
