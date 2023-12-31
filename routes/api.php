<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('cart/addProductInCart', [CartController::class, 'addProductInCart']);
Route::post('cart/removeProductFromCart', [CartController::class, 'removeProductFromCart']);
Route::post('cart/setCartProductQuantity', [CartController::class, 'setCartProductQuantity']);
Route::get('cart/getUserCart', [CartController::class, 'getUserCart']);
