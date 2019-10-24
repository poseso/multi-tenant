<?php


Route::group([
    'prefix' => 'backup',
    'as' => 'backup.',
    'namespace' => 'Backup',
    ['role:'.config('access.users.super_admin_role') .'|'. config('access.users.admin_role')],
], function () {
    // Backup routes
    Route::get('/', 'BackupController@index')->name('index');
    Route::put('create', 'BackupController@create')->name('create');
    Route::get('download/{file_name?}', 'BackupController@download')->name('download');
    Route::delete('delete/{file_name?}', 'BackupController@delete')->where('file_name', '(.*)')->name('delete');
});
