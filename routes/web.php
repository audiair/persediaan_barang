<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriBarangController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/kategoris', [KategoriBarangController::class, 'index'])->name('kategori');
    Route::get('/kategoris/create', [KategoriBarangController::class, 'create'])->name('kategori.create');
    Route::post('/kategoris', [KategoriBarangController::class, 'store'])->name('kategori.store');
    Route::get('/kategoris/{id_kategori}/edit', [KategoriBarangController::class, 'edit'])->name('kategori.edit');
    Route::match(['put', 'patch'],'/kategoris/{id_kategori}', [KategoriBarangController::class, 'update'])->name('kategori.update');
    Route::delete('/kategoris/{id_kategori}', [KategoriBarangController::class, 'destroy'])->name('kategori.destroy');
});

require __DIR__.'/auth.php';
