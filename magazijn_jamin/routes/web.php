<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
// use Illuminate\Support\Arr;

Route::view('/', 'welcome'); // view welcome.blade.php

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
