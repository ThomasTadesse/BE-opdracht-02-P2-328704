<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductPerSupplierController;
use App\Http\Controllers\ProductController;
// use Illuminate\Support\Arr;

Route::view('/', 'welcome'); // view welcome.blade.php

Route::get('/leveranciers', [SupplierController::class, 'index'])->name('leveranciers.index');
Route::get('/leveranciers/{leverancier}', [SupplierController::class, 'show'])->name('leveranciers.show');
Route::post('/leveranciers', [SupplierController::class, 'store'])->name('leveranciers.store');
Route::put('/leveranciers/{leverancier}', [SupplierController::class, 'update'])->name('leveranciers.update');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/suppliers/{supplier}/products', [ProductPerSupplierController::class, 'index'])->name('suppliers.products.index');
Route::post('/suppliers/{supplier}/products/{product}', [ProductPerSupplierController::class, 'store'])->name('suppliers.products.store');
Route::delete('/suppliers/{supplier}/products/{product}', [ProductPerSupplierController::class, 'destroy'])->name('suppliers.products.destroy');
