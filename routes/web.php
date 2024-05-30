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


Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);


Route::middleware('auth:admin')->group(function () {
    Route::get('/', [dashboardController::class,'index']);
    Route::get('/admin/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/admin/ruangan/create', [RuanganController::class, 'create'])->name('admin.create');
    Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('admin.ruangan.store');
    Route::get('/admin/ruangan/{id_ruangan}/edit', [RuanganController::class, 'edit'])->name('admin.ruangan.edit');
    Route::put('/admin/ruangan/{id_ruangan}', [RuanganController::class, 'update'])->name('admin.ruangan.update');
    Route::delete('/admin/ruangan/{id_ruangan}', [RuanganController::class, 'destroy'])->name('admin.ruangan.destroy');
    Route::get('/admin/orders/create', [OrderController::class, 'create'])->name('admin.order.create');
    Route::post('/admin/orders', [OrderController::class, 'store'])->name('admin.order.store');
    Route::post('orders/upload/{id}', [OrderController::class, 'upload'])->name('admin.order.upload');
    Route::get('orders/viewImage/{id}/{image}', [OrderController::class, 'viewImage'])->name('admin.order.viewImage');
    Route::get('orders/downloadImage/{id}/{image}', [OrderController::class, 'downloadImage'])->name('admin.order.downloadImage');
    Route::delete('orders/{id}/deleteImage/{image}', [OrderController::class, 'deleteImage'])->name('admin.order.deleteImage');
    Route::put('/admin/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('admin.order.cancel');
    Route::delete('/admin/orders/{id}/delete', [OrderController::class, 'delete'])->name('admin.order.delete');
    Route::get('/admin/orders/{id}/checkin', [OrderController::class, 'showCheckinForm'])->name('admin.order.checkin');
    Route::post('/admin/orders/{id}/processCheckin', [OrderController::class, 'processCheckin'])->name('admin.order.processCheckin');

    Route::put('/admin/orders/{id}/checkout', [OrderController::class, 'checkout'])->name('admin.order.checkout');
    Route::post('/admin/orders/{id}/upload', [OrderController::class, 'upload'])->name('admin.order.upload');
    Route::get('/admin/orders/{id}/view', [OrderController::class, 'view'])->name('admin.order.view');
    Route::get('/admin/orders/{id}/view/{image}', [OrderController::class, 'viewImage'])->name('admin.order.viewImage');
    Route::delete('/admin/orders/{id}/delete/{image}', [OrderController::class, 'deleteImage'])->name('admin.order.deleteImage');
    Route::get('/admin/orders/{id}/download/{image}', [OrderController::class, 'downloadImage'])->name('admin.order.downloadImage');

//Rute kamar
Route::get("/kamar",[kamarController::class,'index']);
Route::get("/kamar/tambah",[kamarController::class,'create']);
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
//rute fasilitas
Route::get("/fasilitas",[fasilitasController::class,'index']);
Route::get("/fasilitas/tambah",[fasilitasController::class,'create']);
Route::post("/fasilitas/tambah",[fasilitasController::class,'store']);
Route::get("/fasilitas/edit/{id_fasilitas}",[fasilitasController::class,'edit']);
Route::post("/fasilitas/edit",[fasilitasController::class,'update']);
Route::get("/fasilitas/hapus/{id_fasilitas}",[fasilitasController::class,'destroy']);

//rute paket
Route::get("/paket",[paketController::class,'index']);
Route::get("/paket/tambah",[paketController::class,'create']);
Route::post("/paket/tambah",[paketController::class,'store']);
Route::get("/paket/edit/{id_paket}",[paketController::class,'edit']);
Route::post("/paket/edit",[paketController::class,'update']);
Route::get("/paket/hapus/{id_paket}",[paketController::class,'destroy']);
//Rute layout
Route::get("/layout",[layoutController::class,'index']);
Route::get("/layout/tambah",[layoutController::class,'create']);
Route::post("/layout/tambah",[layoutController::class,'store']);
Route::get("/layout/edit/{id_layout}",[layoutController::class,'edit']);
Route::post("/layout/edit",[layoutController::class,'update']);
Route::get("/layout/hapus/{id_layout}",[layoutController::class,'destroy']);

//Rute income
//Route::get('/income', [incomeController::class, 'index'])->name('admin.laporan-pemasukan');
// Route::get('/income/cetak-income', [incomeController::class, 'cetakIncome'])->name('admin.laporan-pemasukan');
// Route::get('/income/lihat-laporan', [incomeController::class, 'viewIncome'])->name('admin.laporan-pemasukan');
Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
Route::get('/income/cetak-income', [IncomeController::class, 'cetakIncome'])->name('income.cetak');


Route::get('/history', [historyController::class, 'index'])->name('admin.history');
Route::get('/admin/orders/available-sessions', [OrderController::class, 'getAvailableSessions']);

//Rute dokumentasi
Route::get('/dokumentasi', [dokumentasiController::class, 'index']);
Route::get('/admin/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/admin/profile/edit-username', [ProfileController::class, 'editUsername'])->name('profile.edit-username');
Route::post('/admin/profile/update-username', [ProfileController::class, 'updateUsername'])->name('profile.update-username');
Route::get('/admin/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
Route::post('/admin/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

});

