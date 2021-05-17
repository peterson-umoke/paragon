<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Web Routes
|--------------------------------------------------------------------------
*/
$baseUrl = str_replace(['http://', 'https://'], '', config('app.url'));
Route::middleware(['auth', 'verified'])
//    ->domain(sprintf("portal.%s", $baseUrl))
    ->name("user.")
    ->group(static function (\Illuminate\Routing\Router $router) {
        $router->get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, '__invoke'])->name('dashboard');
    });
