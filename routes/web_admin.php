<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name("admin.")
    ->group(static function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, '__invoke'])->name('dashboard');
    });
