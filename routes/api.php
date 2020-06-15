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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::resource('categories','CategoryController');
Route::resource('users','UserController');
Route::resource('roles','RoleController');
Route::resource('products','ProductController');
Route::resource('orders','TransactionController');
Route::get('categories/{cat}/products', 'ProductController@getProductByCategory');
Route::resource('reviews','ReviewController');
Route::resource('producers','ProducerController');
Route::resource('addresses','AddressController');

Route::get('users/{user_id}/orders', 'TransactionController@getOrderByUser');
Route::resource('orderstatuses','TransactionStatusController');



Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'
], function ($router) {
    // Route::post('register', 'Auth\AuthController@register');
    Route::post('register', [ 'as' => 'register', 'uses' => 'Auth\AuthController@register']);
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');

});
