<?php
use App\Http\Controllers\ProductController;

Route::middleware('auth:api')->get('/product/{id}', [ProductController::class, 'getProductDetails']);
