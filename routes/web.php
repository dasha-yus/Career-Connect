<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::prefix('jobs')->group(function () {
    Route::get('/create', [JobController::class, 'create']);

    Route::post('', [JobController::class, 'store']);

    Route::get('/{job}/edit', [JobController::class, 'edit']);

    Route::put('/{job}', [JobController::class, 'update']);

    Route::delete('/{job}', [JobController::class, 'destroy']);

    Route::get('/{job}', [JobController::class, 'show']);
});

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);
