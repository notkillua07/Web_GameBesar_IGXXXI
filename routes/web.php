<?php

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

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});



Route::group(
    ['middleware' => ['auth', 'admin']],
    function () {
        Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
        Route::post('/admin-ganti', [App\Http\Controllers\AdminController::class, 'changeMonth'])->name('admin.bulan');
        Route::post('/admin-inf', [App\Http\Controllers\AdminController::class, 'inflation'])->name('admin.inflasi');
        Route::post('/admin-get', [App\Http\Controllers\AdminController::class, 'getTeam'])->name('admin.getTeam');
    }
);


Route::group(
    ['middleware' => ['auth', 'penjualan']],
    function () {
        // Penjualan
        Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan');
        Route::post('/penjualan-get', [App\Http\Controllers\PenjualanController::class, 'getInvSupply'])->name('penjualan.getInv');
        Route::post('/penjualan-sell', [App\Http\Controllers\PenjualanController::class, 'sellInventory'])->name('penjualan.sellInv');
    }
);

Route::group(
    ['middleware' => ['auth', 'pembelian']],
    function () {
        // Pembelian
        Route::get('/pembelian', [App\Http\Controllers\PembelianController::class, 'index'])->name('pembelian');
        Route::post('/pembelian-getCur', [App\Http\Controllers\PembelianController::class, 'getCurrency'])->name('pembelian.getCurr');
        Route::post('/pembelian-get', [App\Http\Controllers\PembelianController::class, 'getCitySupply'])->name('pembelian.getCity');
        Route::post('/pembelian-buy', [App\Http\Controllers\PembelianController::class, 'buySupply'])->name('pembelian.buySup');
    }
);

Route::group(
    ['middleware' => ['auth', 'distribusi']],
    function () {
        // Distribusi
        Route::get('/distribusi', [App\Http\Controllers\DistribusiController::class, 'index'])->name('distribusi');
        Route::post('/distribusi-getInv', [App\Http\Controllers\DistribusiController::class, 'getInvSupply'])->name('distribusi.getInv');
        Route::post('/distribusi-getTrans', [App\Http\Controllers\DistribusiController::class, 'getTransport'])->name('distribusi.getTrans');
        Route::post('/distribusi-cekMuatan', [App\Http\Controllers\DistribusiController::class, 'cekMuatan'])->name('distribusi.cekMuatan');
        Route::post('/distribusi-sendMuatan', [App\Http\Controllers\DistribusiController::class, 'sendMuatan'])->name('distribusi.sendMuatan');
    }
);

Route::group(
    ['middleware' => ['auth', 'hutang']],
    function () {
        Route::get('/hutang', [App\Http\Controllers\HutangController::class, 'index'])->name('hutang');
        Route::post('/penpos-hutang', [\App\Http\Controllers\HutangController::class, 'hutangTim'])->name('penpos.hutang');
    }
);

Route::group(
    ['middleware' => ['auth', 'dashboard']],
    function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    }
);
