<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;
use Illuminate\Support\Arr;

Route::view('/', 'welcome'); // view welcome.blade.php

Route::resource('magazijn', MagazijnController::class);

Route::get('/magazijn', [MagazijnController::class, 'index']); // view magazijn.blade.php
Route::get('/magazijn/{id}', [MagazijnController::class, 'show']); // view magazijn.blade.php
Route::get('/magazijn/create', [MagazijnController::class, 'create']); // view create.blade.php
Route::get('/magazijn/{id}/edit', [MagazijnController::class, 'edit']); // view edit.blade.php
Route::post('/magazijn', [MagazijnController::class, 'store']); // store data
Route::put('/magazijn/{id}', [MagazijnController::class, 'update']); // update data
Route::delete('/magazijn/{id}', [MagazijnController::class, 'destroy']); // delete data

