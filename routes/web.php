<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/barang-masuk', function () {
    return view('masuk');
})->name('barang-masuk');
Route::get('/barang-keluar', function () {
    return view('keluar');
})->name('barang-keluar');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk');
Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barang.store');

require __DIR__.'/auth.php';
