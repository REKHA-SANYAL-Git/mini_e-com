<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\Api\OrderController as ApiOrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('products', [ApiProductController::class, 'index']);

// Protected Routes (require login)
Route::middleware('auth:sanctum')->group(function () {
    // Orders
    Route::post('/order', [ApiOrderController::class, 'store']);
    Route::get('/orders', [ApiOrderController::class, 'index']);
    
    // Additional routes can be added here
});
