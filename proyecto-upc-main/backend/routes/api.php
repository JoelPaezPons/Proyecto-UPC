<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatelliteController;
use App\Http\Controllers\AuthController;


// Protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/satellites', [SatelliteController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/favorites', [SatelliteController::class, 'favorites']);
    Route::post('/favorites/{id}', [SatelliteController::class, 'addFavorite']);
    Route::delete('/favorites/{id}', [SatelliteController::class, 'removeFavorite']);
});