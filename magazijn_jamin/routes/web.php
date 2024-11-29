<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;
use App\Models\Magazijn;
use App\Http\Controllers\LeverancierController;
use App\Models\Leverancier;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::resource('magazijn', MagazijnController::class);

Route::get('/magazijn', [MagazijnController::class, 'index'])->name('magazijn.index'); // view magazijn.blade.php
Route::get('/magazijn/{id}', [MagazijnController::class, 'show'])->name('magazijn.show'); // view magazijn.blade.php
Route::get('/magazijn/create', [MagazijnController::class, 'create'])->name('magazijn.create'); // view create.blade.php
Route::get('/magazijn/{id}/edit', [MagazijnController::class, 'edit'])->name('magazijn.edit'); // view edit.blade.php
Route::post('/magazijn', [MagazijnController::class, 'store'])->name('magazijn.store'); // store data
Route::put('/magazijn/{id}', [MagazijnController::class, 'update'])->name('magazijn.update'); // update data
Route::delete('/magazijn/{id}', [MagazijnController::class, 'destroy'])->name('magazijn.destroy'); // delete data

Route::resource('leverancier', LeverancierController::class);

Route::get('/leverancier', [LeverancierController::class, 'index'])->name('leverancier.index'); // view leverancier.blade.php
Route::get('/leverancier/{id}', [LeverancierController::class, 'show'])->name('leverancier.show'); // view leverancier.blade.php
Route::get('/leverancier/create', [LeverancierController::class, 'create'])->name('leverancier.create'); // view create.blade.php
Route::get('/leverancier/{id}/edit', [LeverancierController::class, 'edit'])->name('leverancier.edit'); // view edit.blade.php
Route::post('/leverancier', [LeverancierController::class, 'store'])->name('leverancier.store'); // store data
Route::put('/leverancier/{id}', [LeverancierController::class, 'update'])->name('leverancier.update'); // update data
Route::delete('/leverancier/{id}', [LeverancierController::class, 'destroy'])->name('leverancier.destroy'); // delete data


