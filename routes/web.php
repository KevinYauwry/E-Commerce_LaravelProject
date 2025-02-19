<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kevin;
use App\Http\Controllers\SessionController;


Route::get('/', function () {
    return view('welcome');
});

// Login Route
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);

// logout Route
Route::post('/sesi/logout', [SessionController::class, 'logout']);

// register route
Route::post('/sesi/create', [SessionController::class, 'create']);

// E-commerce Route
Route::get('/dashboard', [Kevin::class, 'index'])->name('produk.index');
Route::get('/produk/create', [Kevin::class, 'create'])->name('produk.create');
Route::post('/produk', [Kevin::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [Kevin::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [Kevin::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [kevin::class, 'destroy'])->name('produk.destroy');