<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class,'__invoke']);

Route::get('/dashboard', function () {

})->middleware(['auth', 'verified'])->name('dashboard');
