<?php

use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\paketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\incomeController;
use App\Http\Controllers\layoutController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\makananController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dokumentasiController;
use App\Http\Controllers\ProfileController;

// Rute otentikasi admin
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);

Route::middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/', [dashboardController::class,'index']);
    Route::get('/admin/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');

    // Rute ruangan
    Route::prefix('admin/ruangan')->name('admin.ruangan.')->group(function () {
        Route::get('/', [RuanganController::class, 'index'])->name('index');
        Route::get('/create', [RuanganController::class, 'create'])->name('create');
        Route::post('/', [RuanganController::class, 'store'])->name('store');
        Route::get('/{id_ruangan}/edit', [RuanganController::class, 'edit'])->name('edit');
        Route::put('/{id_ruangan}', [RuanganController::class, 'update'])->name('update');
        Route::delete('/{id_ruangan}', [RuanganController::class, 'destroy'])->name('destroy');
    });

    // Rute pesanan
    Route::prefix('admin/orders')->name('admin.order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::post('/', [OrderController::class, 'store'])->name('store');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('edit');
        Route::put('/{id}', [OrderController::class, 'update'])->name('update');
        Route::put('/{id}/cancel', [OrderController::class, 'cancel'])->name('cancel');
        Route::delete('/{id}/delete', [OrderController::class, 'delete'])->name('delete');
        Route::get('/{id}/checkin', [OrderController::class, 'showCheckinForm'])->name('checkin');
        Route::post('/{id}/processCheckin', [OrderController::class, 'processCheckin'])->name('processCheckin');
        Route::put('/{id}/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('/{id}/upload', [OrderController::class, 'upload'])->name('upload');
        Route::get('/{id}/view', [OrderController::class, 'view'])->name('view');
        Route::get('/{id}/view/{image}', [OrderController::class, 'viewImage'])->name('viewImage');
        Route::delete('/{id}/delete/{image}', [OrderController::class, 'deleteImage'])->name('deleteImage');
        Route::get('/{id}/download/{image}', [OrderController::class, 'downloadImage'])->name('downloadImage');
        Route::get('/available-sessions', [OrderController::class, 'getAvailableSessions']);
        Route::get('/get-paket-price', [OrderController::class, 'getPaketPrice']);
        Route::get('/get-dp-payment-id', [OrderController::class, 'getDpPaymentId']);
    });

    // Rute makanan
    Route::prefix('makanan')->name('makanan.')->group(function () {
        Route::get('/', [makananController::class, 'index']);
        Route::get('/tambah', [makananController::class, 'create']);
        Route::post('/tambah', [makananController::class, 'store']);
        Route::get('/edit/{id_makanan}', [makananController::class, 'edit']);
        Route::post('/edit', [makananController::class, 'update']);
        Route::get('/hapus/{id_makanan}', [makananController::class, 'destroy']);
    });

    // Rute paket
    Route::prefix('paket')->name('paket.')->group(function () {
        Route::get('/', [paketController::class, 'index']);
        Route::get('/tambah', [paketController::class, 'create']);
        Route::post('/tambah', [paketController::class, 'store']);
        Route::get('/edit/{id_paket}', [paketController::class, 'edit']);
        Route::post('/edit', [paketController::class, 'update']);
        Route::get('/hapus/{id_paket}', [paketController::class, 'destroy']);
    });

    // Rute layout
    Route::prefix('layout')->name('layout.')->group(function () {
        Route::get('/', [layoutController::class, 'index']);
        Route::get('/tambah', [layoutController::class, 'create']);
        Route::post('/tambah', [layoutController::class, 'store']);
        Route::get('/edit/{id_layout}', [layoutController::class, 'edit']);
        Route::put('/edit', [layoutController::class, 'update'])->name('update');
        Route::get('/hapus/{id_layout}', [layoutController::class, 'destroy']);
    });

    // Rute income
    Route::prefix('income')->name('income.')->group(function () {
        Route::get('/', [incomeController::class, 'index'])->name('index');
        Route::get('/cetak-income', [incomeController::class, 'cetakIncome'])->name('cetak');
    });

    // Rute history
    Route::get('/history', [historyController::class, 'index'])->name('admin.history');

    // Rute dokumentasi
    Route::get('/docs', [dokumentasiController::class, 'index']);

    // Rute profil
    Route::prefix('admin/profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit-username', [ProfileController::class, 'editUsername'])->name('edit-username');
        Route::post('/update-username', [ProfileController::class, 'updateUsername'])->name('update-username');
        Route::get('/edit-password', [ProfileController::class, 'editPassword'])->name('edit-password');
        Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    });

    // About page
    Route::get('/about', function () {
        return view('about-us.index');
    });
});