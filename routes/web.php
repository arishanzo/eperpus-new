<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');;

Route::middleware('auth')->group(function () {


    Route::get('/laporan', [DendaController::class, 'index'])->name('datalaporan');
    Route::delete('/laporandestroy/{data_denda}', [DendaController::class, 'destroy'])->name('data_denda_destroy');
    Route::get('/laporanbayar/{data_denda}', [DendaController::class, 'bayar'])->name('data_denda_bayar');

    Route::resource('data_santri', SantriController::class);
    Route::get('/datasantritambah', [SantriController::class, 'create'])->name('data_santri_tambah');
    Route::get('/datasantriedit/{data_Santri}', [SantriController::class, 'edit'])->name('data_santri_edit');

    Route::resource('data_buku', BukuController::class);
    Route::get('/databukutambah', [BukuController::class, 'create'])->name('data_buku_tambah');
    Route::get('/databukuedit/{data_buku}', [BukuController::class, 'edit'])->name('data_buku_edit');

    Route::resource('data_pinjam', PinjamController::class);
    Route::get('/datapinjamtambah', [PinjamController::class, 'create'])->name('data_pinjam_tambah');
    Route::get('/datapinjamkembalikan/{data_pinjam}', [PinjamController::class, 'kembalikan'])->name('data_pinjam_kembalikan');

});

require __DIR__.'/auth.php';
