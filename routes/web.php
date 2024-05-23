<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\AdminAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< Updated upstream
=======

Route::get('/history', function () {
    // Your history logic here
    return view('history');
});

    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
>>>>>>> Stashed changes
