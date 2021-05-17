<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$baseUrl = str_replace(['http://', 'https://'], '', config('app.url'));

require __DIR__ . '/auth_admin.php';
require __DIR__ . '/auth_user.php';
require __DIR__ . '/web_user.php';
require __DIR__ . '/web_admin.php';


/*
|--------------------------------------------------------------------------
| Guest Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [\App\Http\Controllers\WelcomeController::class, '__invoke'])->name("welcome");
