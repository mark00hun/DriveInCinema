<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScreeningController;

Route::middleware('api')->group(function () {
    Route::get('/movies', [MovieController::class, 'index']);
    Route::post('/movies', [MovieController::class, 'store']);
    Route::get('/movies/{id}', [MovieController::class, 'show']);
    Route::put('/movies/{id}', [MovieController::class, 'update']);
    Route::delete('/movies/{id}', [MovieController::class, 'destroy']);

    Route::get('/screenings', [ScreeningController::class, 'index']);
    Route::post('/screenings', [ScreeningController::class, 'store']);
    Route::get('/screenings/{id}', [ScreeningController::class, 'show']);
    Route::put('/screenings/{id}', [ScreeningController::class, 'update']);
    Route::delete('/screenings/{id}', [ScreeningController::class, 'destroy']);
});
