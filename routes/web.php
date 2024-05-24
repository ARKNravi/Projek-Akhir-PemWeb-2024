<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\makananController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\dashboardController;

Route::get('/', [dashboardController::class,'index']);
Route::get('/packets');
Route::get('/orders');
Route::get('/income');
Route::get('/history');
Route::get('/profile');
Route::get('/docs');

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/admin/ruangan/create', [RuanganController::class, 'create'])->name('admin.create');
    Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('admin.ruangan.store');
    Route::get('/admin/ruangan/{id_ruangan}/edit', [RuanganController::class, 'edit'])->name('admin.ruangan.edit');
    Route::put('/admin/ruangan/{id_ruangan}', [RuanganController::class, 'update'])->name('admin.ruangan.update');
    Route::delete('/admin/ruangan/{id_ruangan}', [RuanganController::class, 'destroy'])->name('admin.ruangan.destroy');
    Route::get('/admin/reservasi/create', [OrderController::class, 'create'])->name('admin.reservasi.create');
    Route::post('/admin/reservasi', [OrderController::class, 'store'])->name('admin.reservasi.store');
    Route::put('/admin/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('admin.order.cancel');
    Route::delete('/admin/orders/{id}/delete', [OrderController::class, 'delete'])->name('admin.order.delete');
    Route::get('/admin/orders/{id}/checkin', [OrderController::class, 'showCheckinForm'])->name('admin.order.checkin');
    Route::post('/admin/orders/{id}/processCheckin', [OrderController::class, 'processCheckin'])->name('admin.order.processCheckin');// routes/web.php

    Route::put('/admin/orders/{id}/checkout', [OrderController::class, 'checkout'])->name('admin.order.checkout');
    Route::post('/admin/orders/{id}/upload', [OrderController::class, 'upload'])->name('admin.order.upload');
    Route::get('/admin/orders/{id}/view', [OrderController::class, 'view'])->name('admin.order.view');
    Route::get('/admin/orders/{id}/view/{image}', [OrderController::class, 'viewImage'])->name('admin.order.viewImage');
    Route::delete('/admin/orders/{id}/delete/{image}', [OrderController::class, 'deleteImage'])->name('admin.order.deleteImage');
    Route::get('/admin/orders/{id}/download/{image}', [OrderController::class, 'downloadImage'])->name('admin.order.downloadImage');

    Route::post("/kamar/tambah",[kamarController::class,'store']);
Route::get('/kamar/edit/{nomor_kamar}',[kamarController::class,'edit']);
Route::post('/kamar/edit',[kamarController::class,'update']);
Route::get('/kamar/hapus/{nomor_kamar}',[kamarController::class,'destroy']);

//rute makanan
Route::get("/makanan",[makananController::class,'index']);
Route::get("/makanan/tambah",[makananController::class,'create']);
Route::post("/makanan/tambah",[makananController::class,'store']);
Route::get("/makanan/edit/{id_makanan}",[makananController::class,'edit']);
Route::post("/makanan/edit",[makananController::class,'update']);
Route::get("/makanan/hapus/{id_makanan}",[makananController::class,'destroy']);
});