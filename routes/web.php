<?php

use App\http\Controllers\HomeController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\MenuController;
use App\http\Controllers\StokController;
use App\http\Controllers\ProdukController;
use App\http\Controllers\ProdukTitipanController;
use App\http\Controllers\UserController;
use App\http\Controllers\TransaksiController;
use App\http\Controllers\JenisController;
use App\http\Controllers\PelangganController;
use App\http\Controllers\PemesananController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\TentangController;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Route;

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/home', HomeController::class);

    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/jenis', JenisController::class);

        // Export/Import
        Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export-jenis');
        Route::post('import/jenis', [JenisController::class, 'importData'])->name('import-jenis');
        Route::get('export/titipan', [ProdukTitipanController::class, 'exportData'])->name('export-titipan');
        Route::post('import/titipan', [ProdukTitipanController::class, 'importData'])->name('import-titipan');
        Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');
        Route::post('import/menu', [MenuController::class, 'importData'])->name('import-menu');
        Route::get('/titipan/formulir-impor', [ProdukTitipanController::class, 'tampilkanFormImport'])->name('titipan.formulir-impor');
        //Admin
        Route::resource('/menu', MenuController::class);
        Route::resource('/stok', StokController::class);
        Route::resource('/category', CategoryController::class);
        Route::resource('/meja', MejaController::class);
        Route::resource('/jenis', JenisController::class);
        Route::get('tentang-aplikasi', [TentangController::class, 'index'])->name('tentang.index');
        Route::resource('produk_titipan', ProdukTitipanController::class);

        //Route::resource('/category', CategoryController::class);
    });
    //Kasir
    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pelanggan', PelangganController::class);
        Route::resource('/pemesanan', PemesananController::class);
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
        //Route::resource('/produk', ProdukController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        // Route::resource('/category', CategoryController::class);
    });
});
