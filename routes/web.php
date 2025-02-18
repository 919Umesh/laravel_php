<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Embed\ProdudctFrontController;


Route::get('/', [ProdudctFrontController::class, 'product_list']);

Route::post('/store-product', [ProdudctFrontController::class, 'store_product']);
