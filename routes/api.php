<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LocationController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']); 
    Route::post('/', [ProductController::class, 'store']); 
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{id}', [ProductController::class, 'update']); 
    Route::delete('/{id}', [ProductController::class, 'destroy']); 
});


Route::prefix('locations')->group(function () {
    Route::get('/', [LocationController::class, 'index']); 
    Route::post('/', [LocationController::class, 'store']); 
});