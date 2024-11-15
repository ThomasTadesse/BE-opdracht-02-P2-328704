<?php

// use App\Http\Controllers\
// use App\Models\

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Arr;

Route::view('/', 'welcome'); // view welcome.blade.php
// Route::view('about', 'about'); // view about.blade.php

// Route::get('profile', [ProfileController::class, 'index']);

// CRUD 
// Route::get('/jobs/create', [JobController::class, 'create']);
// Route::post('/jobs', [JobController::class, 'store']);
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);