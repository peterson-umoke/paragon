<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name("admin.")
    ->group(static function (\Illuminate\Routing\Router $router) {
        $router->get('/login', [AuthenticatedSessionController::class, 'create'])
            ->middleware('guest:admin')
            ->name('login');

        $router->post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware('guest:admin');

        $router->get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
            ->middleware('auth:admin')
            ->name('verification.notice');

        $router->get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['auth:admin', 'signed', 'throttle:6,1'])
            ->name('verification.verify');

        $router->post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['auth:admin', 'throttle:6,1'])
            ->name('verification.send');

        $router->post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->middleware('auth:admin')
            ->name('logout');
    });
