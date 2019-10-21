<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Backend\Settings\SettingsController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::domain('multi-tenant.local')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
});

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:dashboard.read');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account')->middleware('permission:settings.read');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('permission:settings.update');
        Route::patch('profile/update/settings', [SettingsController::class, 'updateUserSettings'])->name('profile.update.settings')->middleware('permission:settings.update');
    });
});
