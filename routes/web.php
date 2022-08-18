<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/menu', function () {
    return view('menu.menu');
});


// Route::get('/menus', [UserController::class, 'index'])->name('menu.index');

Route::get('/dashboard', [UserController::class, 'readDashboard'])->name('dashboard');
Route::get('/barang', [UserController::class, 'readBarang'])->name('barang');
Route::get('/pelanggan', [UserController::class, 'readPelanggan'])->name('pelanggan');
Route::get('/transaksi', [UserController::class, 'readTransaksi'])->name('transaksi');


// transaksi
Route::post('/create/transaksi', [TransaksiController::class, 'createTransaksi'])->name('create.transaksi');
Route::get('/delete/transaksi/{id}', [TransaksiController::class, 'deleteTransaksi'])->name('delete.transaksi');
Route::post('/update/transaksi/{id}', [TransaksiController::class, 'updateTransaksi'])->name('update.transaksi');


// pelanggan
Route::post('/create/transaksi', [TransaksiController::class, 'createTransaksi'])->name('create.transaksi');
