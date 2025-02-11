<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']); // List all products
    Route::post('/', [ProductController::class, 'store']); // Create a new product
    Route::get('/{id}', [ProductController::class, 'show']); // Get a single product
    Route::put('/{id}', [ProductController::class, 'update']); // Update a product
    Route::delete('/{id}', [ProductController::class, 'destroy']); // Delete a product
});