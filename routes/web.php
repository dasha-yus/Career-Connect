<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::prefix('jobs')->group(function () {
    Route::get('/create', [JobController::class, 'create'])->middleware('auth');

    Route::post('', [JobController::class, 'store'])->middleware('auth');

    Route::get('/{job}/edit', [JobController::class, 'edit'])->middleware('auth');

    Route::put('/{job}', [JobController::class, 'update'])->middleware('auth');

    Route::delete('/{job}', [JobController::class, 'destroy'])->middleware('auth');

    Route::get('/{job}', [JobController::class, 'show']);
});

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);
