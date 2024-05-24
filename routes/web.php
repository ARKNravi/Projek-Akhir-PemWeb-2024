<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\layoutController;
use App\Http\Controllers\makananController;


Route::get('/', [dashboardController::class,'index']);
Route::get('/packets');
Route::get('/order',[OrderController::class,'index']);
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
});

//Rute kamar
Route::get("/kamar",[kamarController::class,'index']);
Route::get("/kamar/tambah",[kamarController::class,'create']);
Route::post("/kamar/tambah",[kamarController::class,'store']);
Route::get('/kamar/edit/{nomor_kamar}',[kamarController::class,'edit']);
Route::post('/kamar/edit',[kamarController::class,'update']);
Route::get('/kamar/hapus/{nomor_kamar}',[kamarController::class,'destroy']);