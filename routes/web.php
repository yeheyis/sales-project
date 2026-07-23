<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoaneeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanPaidAmountController;

Route::get('/', function () {
    return view('home');
})->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');

// Sales Route

Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');

Route::get('/sales/create/{product}', [SaleController::class, 'create'])->name('sales.create');

Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

Route::get('/sales/{sale}', [SaleController::class, 'show'])->name('sales.show');

// Route::get('/sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');

Route::put('/sales/{sale}', [SaleController::class, 'update'])->name('sales.update');

Route::delete('/sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');

Route::post('/sales/filter', [SaleController::class, 'filter'])->name('sales.filter');

// Loans Route

Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');

Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');

Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');

Route::get('/loans/{loan}', [LoanController::class, 'show'])->name('loans.show');

Route::put('/loans/{loan}', [LoanController::class, 'update'])->name('loans.update');

Route::delete('/loans/{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');

//Loanee Route

Route::get('/loanee', [LoaneeController::class, 'index'])->name('loanee.index');

Route::get('/loanee/create', [LoaneeController::class, 'create'])->name('loanee.create');

Route::post('/loanee', [LoaneeController::class, 'store'])->name('loanee.store');

Route::get('/loanee/{loanee}', [LoaneeController::class, 'show'])->name('loanee.show');

// LoanPaid Routes

Route::post('/loan-paid-amount', [LoanPaidAmountController::class, 'store'])->name('loan-paid-amount.store');


