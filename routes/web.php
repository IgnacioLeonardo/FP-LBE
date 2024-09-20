<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [ProdukController::class, 'tampil'])->name('produk.tampil');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/submit', [ProdukController::class, 'submit'])->name('produk.submit');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::post('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
Route::post('/produk/add-to-cart/{id}', [ProdukController::class, 'addToCart'])->name('produk.addtocart');
Route::get('/produk/cart', [ProdukController::class, 'viewCart'])->name('produk.cart');
Route::post('/produk/add-to-cart/{id}', [ProdukController::class, 'addToCart'])->name('produk.addtocart');
Route::post('/produk/remove-from-cart/{id}', [ProdukController::class, 'removeFromCart'])->name('produk.removeFromCart');
Route::post('/produk/delete-from-cart/{id}', [ProdukController::class, 'deleteFromCart'])->name('produk.deleteFromCart');
Route::get('/produk/checkout', [ProdukController::class, 'checkout'])->name('produk.checkout');


