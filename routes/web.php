<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;


Route::get('/', [dashboardController::class,'index']);
Route::get('/packets');
Route::get('/orders');
Route::get('/income');
Route::get('/history');
Route::get('/profile');
Route::get('/docs');