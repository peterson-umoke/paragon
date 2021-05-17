<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.admin:admin', 'verified.admin', 'inertia.admin'])
    ->domain(sprintf("admin.%s", $baseUrl))
    ->name("admin.")
    ->group(static function (\Illuminate\Routing\Router $router) {
        $router->get('/', [\App\Http\Controllers\Admin\DashboardController::class, '__invoke'])->name('dashboard');
    });
