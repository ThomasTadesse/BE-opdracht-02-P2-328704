<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;
use Illuminate\Support\Arr;

Route::view('/', 'welcome'); // view welcome.blade.php

Route::resource('magazijn', MagazijnController::class);

Route::get('/magazijn', [MagazijnController::class, 'index'])->name('magazijn.index'); // view magazijn.blade.php
Route::get('/magazijn/{id}', [MagazijnController::class, 'show'])->name('magazijn.show'); // view magazijn.blade.php
Route::get('/magazijn/create', [MagazijnController::class, 'create'])->name('magazijn.create'); // view create.blade.php
Route::get('/magazijn/{id}/edit', [MagazijnController::class, 'edit'])->name('magazijn.edit'); // view edit.blade.php
Route::post('/magazijn', [MagazijnController::class, 'store'])->name('magazijn.store'); // store data
Route::put('/magazijn/{id}', [MagazijnController::class, 'update'])->name('magazijn.update'); // update data
Route::delete('/magazijn/{id}', [MagazijnController::class, 'destroy'])->name('magazijn.destroy'); // delete data

