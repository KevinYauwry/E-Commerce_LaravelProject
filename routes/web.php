<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kevin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [Kevin::class, 'index'])->name('produk.index');
Route::get('/produk/create', [Kevin::class, 'create'])->name('produk.create');
Route::post('/produk', [Kevin::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [Kevin::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [Kevin::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [kevin::class, 'destroy'])->name('produk.destroy');