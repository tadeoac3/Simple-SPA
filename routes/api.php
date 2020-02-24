<?php

use Illuminate\Http\Request;

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

Route::get('products/get-products-in-cart', 'Api\ProductController@getProductsInCart');
Route::get('products/{id}', 'Api\ProductController@find');
Route::get('products', 'Api\ProductController@index');

Route::post('products/add-to-cart', 'Api\ProductController@addToCart');
Route::post('products/remove-from-cart', 'Api\ProductController@removeFromCart');
Route::post('products/remove-and-update-products', 'Api\ProductController@removeAndUpdateProducts');

Route::apiResource('users', 'Api\UserController');
