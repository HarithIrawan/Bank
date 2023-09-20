<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputSampahController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KategoriSampahController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

// Home Admin
Route::get('/homeAdmin', [HomeController::class, 'homeAdmin'])->name('dashboardAdmin');
// End Home Admin

Route::middleware(['isAdmin'])->group(function () {
    // Home Admin
    Route::get('/homeAdmin', [HomeController::class, 'homeAdmin'])->name('dashboardAdmin');
    // End Home Admin

    // Home Kategori Sampah
    Route::get('/admin/homeKategoriSampah', [KategoriSampahController::class, 'index'])->name('homeKategoriSampah');
    // End Home Kategori Sampah

    //--Tambah Kategori--//
    Route::get('admin/homeKategoriSampah/create', [KategoriSampahController::class, 'create'])->name('viewTambahKategoriSampah');
    Route::post('admin/homeKategoriSampah/store', [KategoriSampahController::class, 'store'])->name('tambahKategoriSampah');
    //--End Tambah Kategori--//

    //--Hapus Kategori--//
    Route::delete('/admin/homeKategoriSampah/delete/{category}', [KategoriSampahController::class, 'destroy'])->name('hapusKategori');
    //--End Hapus Kategori--//

    // Home Jenis Sampah
    Route::get('/admin/homeJenisSampah', [JenisSampahController::class, 'index'])->name('homeJenisSampah');
    // End Home Jenis Sampah

    //--ACC Transaki--//
    Route::put('/admin/homeJenisSampah/acc/{id}', [JenisSampahController::class, 'accTransaksi'])->name('accTransaksi');
    //--End ACC Transaki--//

    //--Hapus Transaksi--//
    Route::delete('/admin/homeJenisSampah/delete/{id}', [JenisSampahController::class, 'destroy'])->name('hapusTransaksi');
    //--End Hapus Transaksi--//
});

Route::middleware(['isUser'])->group(function () {
    // Home User
    Route::get('/homeUser', [HomeController::class, 'homeUser'])->name('dashboardUser');
    // End Home User

    // Home Input Sampah
    Route::get('/user/homeInputSampah', [InputSampahController::class, 'index'])->name('homeInputSampah');
    // End Home Input Sampah

    //--Tambah Transaksi--//
    Route::get('user/homeInputSampah/create', [InputSampahController::class, 'create'])->name('viewTambahInputSampah');
    Route::post('user/homeInputSampah/store', [InputSampahController::class, 'store'])->name('tambahTransaksiSampah');
    //--End Tambah Transaksi--//

    //--Update Harga--//
    Route::post('/user/homeInputSampah/updateHargaKg', [InputSampahController::class, 'updateHargaKg'])->name('updateHargaKg');
    //--End Update Harga--//

});
