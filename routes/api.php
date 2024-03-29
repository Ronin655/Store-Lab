<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\DiscountedController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Orders\OrderItemController;
use App\Http\Controllers\Products\ProductController;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('registration', [AuthController::class, 'registration']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('profile', [AuthController::class, 'profile']);
});

Route::post('orders', [OrderController::class, 'store'])
    ->middleware(['auth:api']);

Route::apiResource('orders.order-items', OrderItemController::class)
    ->only(['store', 'update', 'destroy'])
    ->shallow();

Route::apiResource('categories', CategoryController::class)
    ->only('index', 'store', 'update', 'destroy');

Route::apiResource('brands', BrandController::class)
    ->only('index', 'store', 'update', 'destroy');

Route::apiResource('products', ProductController::class);

Route::apiResource('discounteds', DiscountedController::class)
    ->only('index', 'store', 'update', 'destroy');

Route::bind('products', function ($name){
    return Product::where('name', $name)->firstOrFail();
});


