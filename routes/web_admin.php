<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
*/

$baseUrl = str_replace(['http://', 'https://'], '', config('app.url'));
Route::middleware(['auth.admin:admin', 'verified.admin', 'inertia.admin'])
    ->domain(sprintf("%s%s", "admin.", $baseUrl))
    ->name("admin.")
    ->group(static function (\Illuminate\Routing\Router $router) {
        $router->get('/', [\App\Http\Controllers\Admin\DashboardController::class, '__invoke'])->name('dashboard');
    });
