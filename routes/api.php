<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->group(function() {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('{id}', [CategoryController::class, 'show']);
    Route::post('store', [CategoryController::class, 'store']);
    Route::delete('{id}', [CategoryController::class, 'destroy']);
    Route::get('{category}/products', [ProductController::class, 'byCategory']);
});

Route::prefix('products')->group(function() {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('{id}', [ProductController::class, 'show']);
    Route::post('store', [ProductController::class, 'store']);
    Route::delete('{id}', [ProductController::class, 'destroy']);
});

Route::prefix('sales')->group(function() {
    Route::get('/', [SaleController::class, 'index']);
    Route::get('{id}', [SaleController::class, 'show']);
    Route::post('store', [SaleController::class, 'store']);
    Route::delete('{id}', [SaleController::class, 'destroy']);
    Route::get('{sale}/sale-details', [SaleDetailController::class, 'bySale']);
});

Route::prefix('sale-details')->group(function() {
    Route::get('/', [SaleDetailController::class, 'index']);
    Route::get('{id}', [SaleDetailController::class, 'show']);
    Route::post('store', [SaleDetailController::class, 'store']);
    Route::delete('{id}', [SaleDetailController::class, 'destroy']);
});
