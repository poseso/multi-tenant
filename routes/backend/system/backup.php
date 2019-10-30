<?php

use App\Http\Controllers\Backend\System\Backup\BackupController;

Route::group([
    'prefix' => 'backup',
    'as' => 'backup.',
    'namespace' => 'Backup',
    ['role:'.config('access.users.super_admin_role').'|'.config('access.users.admin_role')],
], function () {
    // Backup routes
    Route::get('/', [BackupController::class, 'index'])->name('index');
    Route::put('create', [BackupController::class, 'create'])->name('create');
    Route::get('download/{file_name?}', [BackupController::class, 'download'])->name('download');
    Route::delete('delete/{file_name?}', [BackupController::class, 'delete'])->where('file_name', '(.*)')->name('delete');
});
