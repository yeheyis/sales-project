<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/products', [ProductController::class, 'store'])->name('product.store');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

// Sales Route

Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');

Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');