<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return inertia()->render('Welcome', [
            'canLogin' => Route::has('user.login'),
            'canRegister' => Route::has('user.register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
