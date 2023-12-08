<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
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
    return redirect()->route('home');
})->name('/');

Route::middleware('auth')->prefix('pegawai')->group(function () {
    Route::get('/index', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/createuser', [PegawaiController::class, 'createuser'])->name('createuser');
    Route::get('/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('/edituser/{id}', [PegawaiController::class, 'edituser'])->name('edituser');
    Route::get('/delete/{id}', [PegawaiController::class, 'destroy'])->name('delete');
});

Route::prefix('pinjam')->group(function () {
    Route::get('/index', [PeminjamanController::class, 'index'])->name('pinjam.index')->middleware('auth');
    Route::post('/store', [PeminjamanController::class, 'store'])->name('pinjam.store');
});
Route::prefix('pengembalian')->group(function () {
    Route::get('/index', [PengembalianController::class, 'index'])->name('pengembalian.index')->middleware('auth');
    Route::post('/store', [PengembalianController::class, 'store'])->name('pengembalian.store');
});
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginuser', [AuthController::class, 'loginuser'])->name('loginuser');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');