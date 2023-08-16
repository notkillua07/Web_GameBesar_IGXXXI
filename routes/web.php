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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/hutang', [App\Http\Controllers\HutangController::class, 'index'])->name('hutang');
Route::post('/penpos-hutang', [\App\Http\Controllers\HutangController::class, 'hutangTim'])->name('penpos.hutang');
Route::get('/pembelian', [App\Http\Controllers\PembelianController::class, 'index'])->name('pembelian');
Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan');
Route::get('/distribusi', [App\Http\Controllers\DistribusiController::class, 'index'])->name('distribusi');
