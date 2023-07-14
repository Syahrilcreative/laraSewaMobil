<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PengembalianController;
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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('store', [LoginController::class, 'loginStore'])->name('login.store');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register/store', [LoginController::class, 'store'])->name('register.store');

Route::group(['middleware' => ['auth']], function(){
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('mobil', MobilController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('pengembalian', PengembalianController::class);


Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
