<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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
Route::prefix('mobil')->group(function () {
    Route::get('/index', [MobilController::class, 'index'])->name('mobil.index')->middleware('auth');
    Route::get('/create', [MobilController::class, 'create'])->name('mobil.create')->middleware('auth');
    Route::post('/createmobil', [MobilController::class, 'createmobil'])->name('createmobil');
});

Route::prefix('pinjam')->group(function () {
    Route::get('/index', [PeminjamanController::class, 'index'])->name('pinjam.index')->middleware('auth');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('pinjam.store');
});
Route::prefix('pengembalian')->group(function () {
    Route::get('/index', [PengembalianController::class, 'index'])->name('pengembalian.index')->middleware('auth');
    Route::post('/store', [PengembalianController::class, 'store'])->name('pengembalian.store');
});
Route::resource('home', HomeController::class);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginuser', [AuthController::class, 'loginuser'])->name('loginuser');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');