<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->name("user.")
    ->group(static function (\Illuminate\Routing\Router $router) {
        $router->get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, '__invoke'])->name('dashboard');
    });
