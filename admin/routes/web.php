<?php

use Admin\Http\Controllers\Auth\AuthenticatedSessionController;
use Admin\Http\Controllers\Auth\NewPasswordController;
use Admin\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['web'],
], function () {
    Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::post('/admin/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::post('/admin/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::get('/admin/{any?}', function () {
    return view('admin::index');
})->where('any', '.*');
