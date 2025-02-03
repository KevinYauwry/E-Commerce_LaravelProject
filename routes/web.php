<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kevin;
use App\Http\Controllers\Tikus;
use App\Http\Controllers\Omnivora;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tikus', [Tikus::class, 'jalan']);
Route::get('/makan', [Tikus::class, 'makan']);
Route::get('/gigi', [Tikus::class, 'gigi']);
Route::get('/menyusui', [Tikus::class, 'menyusui']);
Route::get('/suara', [Tikus::class, 'suara']);
Route::get('/suara2', [Omnivora::class, 'suara']);
Route::get('/hitung', [Tikus::class, 'hitung']);

Route::get('/', [Kevin::class, 'index'])->name('produk.index');
Route::get('/produk/create', [Kevin::class, 'create'])->name('produk.create');
Route::post('/produk', [Kevin::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [Kevin::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [Kevin::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [kevin::class, 'destroy'])->name('produk.destroy');